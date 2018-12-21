<?php $size = sizeof($contacts->getContainer()); ?>
<td>
    <form id="inputComment" method="post">
        <table class="container">
            <tr>
                <td><textarea name="comment" placeholder="Add Comment" rows="1" cols="40" required></textarea></td>
                <td><input name="contactNo" type="number" title="contact No" placeholder="contact No"
                           min="<?= min(0, $size) ?>" max="<?= $size ?>" required/></td>
                <td><input type="submit" value="add Comment" name="addComment"/></td>
            </tr>
        </table>
    </form>
</td>