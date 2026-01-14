<script>
    function insertBullet(el) {
        if (!el) return;
        const bullet = "• ";
        const start = el.selectionStart;
        const end = el.selectionEnd;
        const text = el.value;
        const before = text.substring(0, start);
        const after = text.substring(end, text.length);
        
        // Update value
        el.value = before + bullet + after;
        
        // Restore cursor position
        el.selectionStart = el.selectionEnd = start + bullet.length;
        el.focus();

        // Trigger Livewire to notice the change (especially for .blur models)
        el.dispatchEvent(new Event('input'));
    }
</script>
