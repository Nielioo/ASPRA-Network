{{-- Verification OI --}}
<div>
    <button onclick="confirmAction('verify')"
        class="bg-lime-500 hover:bg-lime-700 text-lime-950 hover:text-white font-semibold py-2 px-4 border border-lime-500 hover:border-transparent rounded">
        Verify OI
    </button>
    <button onclick="confirmAction('needRevision')"
        class="bg-amber-500 hover:bg-amber-700 text-amber-950 hover:text-white font-semibold py-2 px-4 border border-amber-500 hover:border-transparent rounded">
        Need Revision
    </button>
    <button onclick="confirmAction('deny')"
        class="bg-rose-500 hover:bg-rose-700 text-white hover:text-white font-semibold py-2 px-4 border border-rose-500 hover:border-transparent rounded">
        Deny OI
    </button>
</div>

<script>
    function confirmAction(param) {
        if (confirm("Are you sure you " + param.toUpperCase() + "?")) {
            @this.call(param)
        }
    }
</script>
