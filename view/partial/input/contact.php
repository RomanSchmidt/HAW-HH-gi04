<form id="inputContact" method="post" action="index.php">
    <table class="container">
        <tr>
            <td><input type="text" name="firstName" placeholder="First Name" pattern="[A-Za-z]{3, 30}"
                       title="a-Z mit 3 - 30 Zeichen" size="10" required/></td>
            <td><input type="text" name="lastName" placeholder="Last Name" pattern="[A-Za-z]{3, 30}"
                       title="a-Z mit 3 - 30 Zeichen" size="10" required></td>
            <td><input type="url" name="avatar" pattern="https://.*\.(?:png|jpg|gif|jpeg)" placeholder="Avatar URL"
                       size="10" title="Avatar URL" required>
            </td>
            <td><input type="submit" value="add Contact" name="addContact"/></td>
        </tr>
    </table>
</form>