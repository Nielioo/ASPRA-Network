{{-- Verification OI --}}
<div>
    <button onclick="confirmVerifyOrderAction('approve')"
        class="{{ $oiIsVerified ? 'bg-slate-500 hover:bg-slate-700 text-white hover:text-white' : 'bg-lime-500 hover:bg-lime-700 text-lime-950 hover:text-white' }} font-semibold py-2 px-4 border border-lime-500 hover:border-transparent rounded">
        Approve OI
    </button>
    <button onclick="confirmVerifyOrderAction('reject')"
        class="{{ $oiIsVerified ? 'bg-slate-500 hover:bg-slate-700 text-white hover:text-white' : 'bg-rose-500 hover:bg-rose-700 text-white hover:text-white' }} font-semibold py-2 px-4 border border-rose-500 hover:border-transparent rounded">
        Reject OI
    </button>

    @if ($oiIsVerified)
        <div class="col-lg-12 margin-tb">
            <div class="flex items-center justify-between pt-10 pb-4">
                <h1 class="text-2xl dark:text-white">Notifikasi OI</h1>
            </div>
        </div>

        @livewire('oi.oi-whatsapp-notification', ['oi' => $oi])
    @endif
</div>

<script>
    function confirmVerifyOrderAction(param) {
        if (confirm("Are you sure you want to " + param.toUpperCase() + " this OI?")) {
            @this.call(param)
        }
    }
</script>
