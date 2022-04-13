<div>
    <span class="<?php echo e($isLikeByUser ? 'text-primary' : ''); ?>" wire:click="like"><i class="far fa-thumbs-up cursor-pointer"
            ></i><span class="ms-1"><?php echo e($LikeCount); ?></span></span>
    <span class="<?php echo e($isDislikeByUser ? 'text-primary' : ''); ?>" wire:click="dislike"><i class="far fa-thumbs-down cursor-pointer ms-3"
           ></i><span class="ms-1"><?php echo e($DislikeCount); ?></span></span>
</div><?php /**PATH C:\xampp\htdocs\devApp\0806Group\project\resources\views/livewire/react-component.blade.php ENDPATH**/ ?>