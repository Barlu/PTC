
<p> Hello World </p>
<form action='index.php?page=uploadResize' method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <fieldset>
        <table>
            <tr><td align="right">Upload Image</td>
                <td><input type="file" name="myfile" /></td></tr>
            <tr><td><input type="submit" name="submit" value="Upload" /></td></tr>
        </table>
    </fieldset>
</form>
<?php
