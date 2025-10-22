<div x-data="{ src: '' }" x-on:open-modal.window="if ($event.detail.id === 'image-modal') src = $event.detail.src">
    <div class="flex justify-center p-4">
        <img :src="src" class="rounded-xl max-h-[80vh] object-contain">
    </div>
</div>