<form class="form" role="form" method="post">
    <div class="form-group">
        <label for="new_title">Title:</label>
        <input type="text" class="form-control" name="new_title" placeholder="RE:Title"/>
    </div>
    <div class="form-group">
        <label for="new_content">Content:</label>
        <textarea class="form-control" name="new_content" rows="4"  placeholder="Note Content..." autocomplete="off" required></textarea>
    </div>
    <div class="form-group">
        <label for="new_dropped_for">Dropped For:</label>
        <input type="text" class="form-control" name="new_dropped_for" placeholder="Leave blank for unspecified."/>
    </div>
        <div class="form-group">
            <input type="checkbox" id="new_cbAnonymous" name="new_cbAnonymous">
        <label for="new_cbAnonymous">Make Anonymous</label>
        <label><b>*NOTE: </b>Anonymous notes are not tied to your account in any way.<br>
        Consequently, no further actions can be performed on them after they are saved.</label>
    </div>
    <input type='text' name='edit_id' autocomplete='off' hidden>
    <button type="submit" class="btn btn-other btn-block" name="submit">Drop</button>
</form>