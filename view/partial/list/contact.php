<h2>Contacts</h2>
<div class="listContainer contacts">
    <?php

        use Contact\Container\Element\Contact;

        $container = $contacts->getContainer();
        if (!sizeof($container)) {
            echo 'No Contacts!';
        } else {
            ?>
            <table class="container contacts">
                <tr>
                    <th>No.</th>
                    <th>Author</th>
                    <th>Avatar</th>
                    <th></th>
                </tr>
                <?php
                    /* @var $contact Contact */
                    foreach ($container as $key => $contact) {
                        echo join('', [
                            '<tr>',
                            '<td>', ($key + 1), '</td>',
                            '<td>', $contact->getFirstName(), ' ', $contact->getSecondName(), '</td>',
                            '<td><img class="avatar" alt="avatar" src="', addslashes($contact->getAvatar()), '" /></td>',
                            '<td>',
                            '<form name="deleteContact" method="post">',
                            '<input type="submit" value="Delete" class="delete">',
                            '<input type="hidden" name="deleteContact" value="', $key, '">',
                            '</form>',
                            '</td>',
                            '</tr>'
                        ]);
                    }
                ?>
            </table>

        <?php } ?>
</div>
