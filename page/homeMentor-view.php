<div>
    <div>
        <?php 
        foreach($message as $content){
            echo '<div>'.$content.'</div>';
        }
        ?>
    </div>
    <form>
        <input type='text' name='message'/> <input type='submit' value='Send'/>
    </form>
</div>
