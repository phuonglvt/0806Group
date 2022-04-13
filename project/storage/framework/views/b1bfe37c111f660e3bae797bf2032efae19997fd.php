<h4 class="title text-center">SEARCH</h4>
<div class="card my-lg-3">
    <div class="card-body ">
        <form action="">
            <div>
                <label class="form-label" for="searchUsingKey">Key:</label>
                <input type="search" class="form-control" id="searchUsingKey" aria-describedby="search-addon" name="search" value="<?php echo e(request()->input('search')); ?>">
            </div>
            <div style="padding: 10px 0px 0px 0px;">
                <label for="selectMission" class="form-label">Mission:</label>
                <select class="form-select" id="selectMission" name="mission_id">
                    <option value="0">All</option>
                    <?php $__currentLoopData = $all_missions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($request->mission_id == $mission->id): ?>
                    <option value="<?php echo e($mission->id); ?>" selected><?php echo e($mission->name); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($mission->id); ?>"><?php echo e($mission->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div style="padding: 10px 0px 0px 0px;">
                <label for="selectFilter" class="form-label">Filter:</label>
                <select class="form-select" id="selectFilter" name="filter" value="<?php echo e(request()->get('filter')); ?>">
                    <?php switch($request->filter):
                    case ('views'): ?>
                    <option value="views" selected>Descending views</option>
                    <option value="likes">Descending likes</option>
                    <option value="dislikes">Descending dislikes</option>
                    <option value="comments">Descending comments</option>
                    <option value="recently">Descending recently</option>
                    <option value="none">None</option>
                    <?php break; ?>
                    <?php case ('likes'): ?>
                    <option value="views">Descending views</option>
                    <option value="likes" selected>Descending likes</option>
                    <option value="dislikes">Descending dislikes</option>
                    <option value="comments">Descending comments</option>
                    <option value="recently">Descending recently</option>
                    <option value="none">None</option>
                    <?php break; ?>
                    <?php case ('dislikes'): ?>
                    <option value="views">Descending views</option>
                    <option value="likes">Descending likes</option>
                    <option value="dislikes" selected>Descending dislikes</option>
                    <option value="comments">Descending comments</option>
                    <option value="recently">Descending recently</option>
                    <option value="none">None</option>
                    <?php break; ?>
                    <?php case ('comments'): ?>
                    <option value="views">Descending views</option>
                    <option value="likes">Descending likes</option>
                    <option value="dislikes">Descending dislikes</option>
                    <option value="comments" selected>Descending comments</option>
                    <option value="recently">Descending recently</option>
                    <option value="none">None</option>
                    <?php break; ?>
                    <?php case ('recently'): ?>
                    <option value="views">Descending views</option>
                    <option value="likes">Descending likes</option>
                    <option value="dislikes">Descending dislikes</option>
                    <option value="comments">Descending comments</option>
                    <option value="recently" selected>Descending recently</option>
                    <option value="none">None</option>
                    <?php break; ?>
                    <?php default: ?>
                    <?php case ('none'): ?>
                    <option value="views">Descending views</option>
                    <option value="likes">Descending likes</option>
                    <option value="dislikes">Descending dislikes</option>
                    <option value="comments">Descending comments</option>
                    <option value="recently">Descending recently</option>
                    <option value="none" selected>None</option>
                    <?php endswitch; ?>
                </select>
            </div>
            <div style="padding: 15px 0px 0px 0px;">
                <center><button class="btn btn-success d-grid" type="submit">Search</button></center>
            </div>
        </form>
    </div>
</div><?php /**PATH C:\xampp\htdocs\devApp\0806Group\project\resources\views/ideas/search.blade.php ENDPATH**/ ?>