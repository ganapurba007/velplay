<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Support\Str;
use Jenssegers\Agent\Facades\Agent;


class DeviceLimitService
{
    public function registerDevice(User $user)
    {
        $deviceInfo = $this->getDeviceInfo();
        $exsitingDevice = $this->findExsitingDevice($user, $deviceInfo);

        if ($exsitingDevice) {
            $exsitingDevice->update(['last_active' => now()]);
            session(['device_id' => $exsitingDevice->device_id]);
            return $exsitingDevice;
        }

        if ($this->hasReachedDeviceLimit($user)) {
            return false;
        }

        $device = $this->createNewDevice($user, $deviceInfo);
        session(['device_id' => $device->device_id]);
        return $device;
    }

    public function logoutDevice($deviceId)
    {
        UserDevice::where('device_id', $deviceId)->delete();
        session()->forget('device_id');
    }

    private function getDeviceInfo()
    {
        return [
            'device_name' => $this->generateDeviceName(),
            'device_type' => Agent::isDesktop() ? 'desktop' : (Agent::isPhone() ? 'phone' : 'tablet'),
            'platform' => Agent::platform(),
            'platform_version' => Agent::version(Agent::platform()),
            'browser' => Agent::browser(),
            'browser_version' => Agent::version(Agent::browser())
        ];
    }

    private function generateDeviceName()
    {
        return ucfirst(Agent::platform()) . ' ' . ucfirst(Agent::browser());
    }

    private function findExsitingDevice(User $user, array $deviceInfo)
    {
        return UserDevice::where('user_id', $user->id)
            ->where('device_name', $deviceInfo['device_name'])
            ->where('platform', $deviceInfo['platform'])
            ->where('browser', $deviceInfo['browser'])
            ->first();
    }

    private function hasReachedDeviceLimit(User $user)
    {
        $maxDevices = $user->getCurrentPlan()->max_devices ?? 2;
        return UserDevice::where('user_id', $user->id)->count() >= $maxDevices;
    }

    private function createNewDevice(User $user, array $deviceInfo)
    {
        return UserDevice::create([
            'user_id' => $user->id,
            'device_id' => $this->generateDeviceId(),
            'device_name' => $deviceInfo['device_name'],
            'device_type' => $deviceInfo['device_type'],
            'platform' => $deviceInfo['platform'],
            'platform_version' => $deviceInfo['platform_version'],
            'browser' => $deviceInfo['browser'],
            'browser_version' => $deviceInfo['browser_version'],
            'last_active' => now()
        ]);
    }

    private function generateDeviceId()
    {
        return Str::random(32);
    }
}
