<h2>Comments</h2>
<div class="listContainer comments">
    <?php

        use Contact\Container\Element\Comment;

        $container = $comments->getContainer();
        if (!sizeof($container)) {
            echo 'No Comments!';
        } else {
            ?>
            <table class="container comments">
                <tr>
                    <th>No.</th>
                    <th>Comment</th>
                    <th>Author</th>
                    <th>Avatar</th>
                    <th>Created</th>
                    <th></th>
                </tr>
                <?php
                    /* @type $comment Comment */
                    foreach ($container as $key => $comment) {
                        $author = $comment->getAuthor();
                        echo join('', [
                            '<tr>',
                            '<td>', $key + 1, '</td>',
                            '<td class="comment"><textarea disabled>', $comment->getComment(), '</textarea></td>',
                            '<td>', $author->getFirstName(), ' ', $author->getSecondName(), '</td>',
                            '<td><img class="avatar" alt="avatar" src="', $author->getAvatar(), '"/></td>',
                            '<td><input type="datetime-local" disabled step="1" value="', $comment->getCreationDate()->format(Comment::TIME_FORMAT), '"/></td>',
                            '<td>',
                            '<form name="deleteComment" method="post" action="index.php">',
                            '<input type="submit" value="Delete" name="delete" class="delete">',
                            '<input type="hidden" name="deleteComment" value="', $key, '">',
                            '</form>',
                            '</td>',
                            '</tr>'
                        ]);
                    }
                ?>
            </table>
        <?php } ?>
</div>