<td>
    <form id="inputComment" method="post" action="/">
        <table class="container">
            <tr>
                <td><textarea name="comment" placeholder="Add Comment" rows="1" cols="40" required></textarea></td>
                <td><input name="contactNo" type="number" title="contact No" placeholder="contact No" min="1"
                           max="<?= sizeof($contacts->getContainer()) ?>" required/></td>
                <td><input type="submit" value="add Comment" name="addComment"/></td>
            </tr>
        </table>
    </form>
</td>