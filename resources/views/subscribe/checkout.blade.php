@extends('layouts.subscribe')
@section('title', 'Payment Detail')
@section('page-title', 'Payment Detail')

@section('content')
    <div class="flex justify-center">
        <div
            class="w-full max-w-4xl bg-white/10 backdrop-blur-md border border-indigo-600 rounded-xl shadow-lg 
                hover:shadow-xl transition-transform duration-300">

            <!-- Body -->
            <div class="space-y-4 text-gray-200 p-6">
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">{{ $plan->title }} - {{ $plan->duration }} Hari</p>
                    <p class="text-lg font-medium">Rp {{ number_format($plan->price, 0, ',', '.') }}</p>
                </div>
                <hr class="border-gray-600">

                <div class="flex justify-between">
                    <p class="font-semibold">Subtotal</p>
                    <p>Rp {{ number_format($plan->price, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="font-semibold">Ppn 12%</p>
                    <p>Rp {{ number_format($plan->price * 0.12, 0, ',', '.') }}</p>
                </div>
                <hr class="border-gray-600">

                <div class="flex justify-between">
                    <p class="font-semibold">Total Payment</p>
                    <p class="text-lg font-bold text-indigo-300">
                        Rp {{ number_format($plan->price + $plan->price * 0.12, 0, ',', '.') }}
                    </p>
                </div>

                <div class="flex items-start space-x-2">
                    <input id="terms" type="checkbox"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" required>
                    <label for="terms" class="text-sm text-gray-200">
                        By continuing the payment, you agree to our
                        <a href="#" class="text-indigo-400 hover:text-indigo-300">Terms and Conditions</a> and
                        <a href="#" class="text-indigo-400 hover:text-indigo-300">Privacy Policy</a>
                    </label>
                </div>
            </div>

            <!-- Footer -->
            {{-- {{ route('subscribe.process') }} --}}
            <div class="px-6 pb-6">
                <form action="#" method="POST">
                    {{-- @csrf --}}
                    {{-- <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <input type="hidden" name="total_payment" value="{{ $plan->price * 0.12 }}"> --}}

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        id="pay-button">
                        Continue
                    </button>
                    {{-- <a href="{{ route('subscribe.checkout', $plan->id) }}" 
                   class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 
                          text-white py-3 px-4 rounded-lg shadow-lg 
                          hover:from-indigo-700 hover:to-purple-700 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                   Continue
                </a> --}}
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                plan_id: '{{ $plan->id }}',
                amount: '{{ $plan->price * 1.12 }}'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        window.location.href = '/subscribe/success';
                    },
                    onPending: function(result) {
                        window.location.href = '/payment/pending';
                    },
                    onError: function(result) {
                        window.location.href = '/payment/error';
                    },
                    onClose: function() {
                        alert('You closed the payment window without completing the payment');
                    }
                });
            } else {
                alert('Payment failed to initialize');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong');
        });
    });
</script>
@endsection
