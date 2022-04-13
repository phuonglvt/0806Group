

<?php $__env->startSection('title'); ?>
<?php echo e($idea->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>
<link href="<?php echo e(asset('/css/idea.css')); ?>" rel="stylesheet" />
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="idea-block">
        <h4><?php echo e($idea->title); ?>

            <?php if($idea->user->id == auth()->user()->id): ?>
            <a class="float-end ms-2 btn"  href="<?php echo e(route('ideas.edit', $idea->id)); ?>"><i class=" fa fa-solid fa-pen-to-square"></i></a>
            <form method="post" class="float-end" action="<?php echo e(route('ideas.delete', $idea->id)); ?>" style="display: inline;">
                <?php echo method_field('delete'); ?>
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn">
                    <i class=" fa fa-solid fa-trash"></i>
                </button>
            </form>
            <?php endif; ?>
        </h4>
        <p><?php echo e($idea->content); ?></p>
        <h1 class="comments-title">Attachments (<?php echo e($idea->attachments->count()); ?>)</h1>
        <?php $__currentLoopData = $idea->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(asset($attachment->direction)); ?>"><?php echo e($attachment->name); ?></a>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('react-component', [
        'model' => $idea
        ])->html();
} elseif ($_instance->childHasBeenRendered('BNVJAEm')) {
    $componentId = $_instance->getRenderedChildComponentId('BNVJAEm');
    $componentTag = $_instance->getRenderedChildComponentTagName('BNVJAEm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BNVJAEm');
} else {
    $response = \Livewire\Livewire::mount('react-component', [
        'model' => $idea
        ]);
    $html = $response->html();
    $_instance->logRenderedChild('BNVJAEm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <hr>
        <h1 class="comments-title">Comments</h1>
        <div class="be-comment mb-4">
            <?php if(now() < $current_semester_end_day): ?>
            <form action="<?php echo e(url('/ideas/add-comment/' . $idea->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input type="text" class="form-control rounded-corner" name="content" placeholder="Write a comment...">
                    <span class="input-group-btn p-l-10">
                        <button class="btn btn-primary f-s-12 rounded-corner pull-right" type="submit">Submit</button>
                    </span>
                </div>
            </form>
            <?php else: ?>
            <form action="<?php echo e(url('/ideas/add-comment/' . $idea->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input type="text" class="form-control rounded-corner" name="content" placeholder="Comment is unvailable" disabled>
                    <span class="input-group-btn p-l-10">
                        <button class="btn btn-primary f-s-12 rounded-corner pull-right" type="button">Submit</button>
                    </span>
                </div>
            </form>
            <?php endif; ?>
        </div>
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="comment-block">
            <div class="be-img-comment">
                <img src="<?php echo e(auth()->user()->avatar == null? asset('/images/avatar.png'): asset('/storage/images/' . Auth::user()->avatar)); ?>" alt="" class="be-ava-comment">
            </div>
            <div class="be-comment-content">
                <span class="be-comment-name">
                    <strong><?php echo e(auth()->user()->hasRole('staff')? 'Anonymous': $comment->user->name); ?></strong>
                </span>
                <span class="be-comment-time">
                    <?php echo e($comment->created_at->diffForHumans()); ?>

                    <?php if($comment->user_id === auth()->user()->id): ?>
                    <?php echo $__env->make('ideas.edit_comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form method="post" action="<?php echo e(route('comments.delete', $comment->id)); ?>" style="display: inline;">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="border: none; padding: 0; background: none;">
                            <i class=" fa fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <?php else: ?>
                    <i class=" fa fa-solid fa-pen-to-square"></i>
                    <i class=" fa fa-solid fa-trash"></i>
                    <?php endif; ?>

                </span>

                <p class="be-comment-text">
                    <?php echo e($comment->content); ?>

                </p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($comments->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devApp\0806Group\project\resources\views/ideas/details.blade.php ENDPATH**/ ?>