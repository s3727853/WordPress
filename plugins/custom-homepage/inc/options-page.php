<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Homepage Settings', 'homepage_settings'); ?></h1>
    <form method="post" action="options.php">
        
        <?php
        // Setup fields so WP can process the form correctly
        settings_fields( 'banner_fields');
        do_settings_sections( 'banner_fields');
        ?>
        
        
        <!-- Display form contents for changing the banner and banner text-->
        
        <h2>Banner and Banner Text Settings</h2>
        <p>If changing the banner please go to Media and copy the link from the image and paste below.</p><br>
        <!--The large image width was to handle widescreen displays. Probably not the best solution but it works for now -->
        <p>Please ensure banner image is 3500 pixels wide by 170 pixels tall.</p>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Image Link:</th>
                <td><input type="text" style="width: 1000px;" name="banner_image" value="<?php echo get_option('banner_image'); ?>"/></td>
            </tr>
            <tr align="top">
                <th scope="row">Banner Text:</th>
                <td><input type="text" style="width: 1000px;" name="banner_text" value="<?php echo get_option('banner_text'); ?>"/></td>
            </tr>
        </table>
    
        <!-- Display form contents for changing the featured products-->
        
        <?php
        $checked = get_option('feature_text');
        ?>
        <h2>Featured Products</h2>
        <p>Please select the product category you would like to feature on the homepage.</p>
        <p>This will display the top 3 products from the selected catgory on the homepage.</p>
         <h4>Select a Category:</h4>
         <!-- Checkboxs will reflect which category has been set, multiple can be selected visually but only the last one selected will actually be passed in-->
         <!-- Given more time it would be worth implementing some javascipt to ensure only one checkbox could be checked on the frontend to avoid confusion-->
        <input type="checkbox" id="beds" name="feature_text" value="Beds" <?php if ($checked == 'Beds') echo "checked='checked'"; ?>>
        <label for="beds">Beds</label><br>
        <input type="checkbox" id="grooming" name="feature_text" value="Grooming" <?php if ($checked == 'Grooming') echo "checked='checked'"; ?>>
        <label for="grooming">Grooming</label><br>
        <input type="checkbox" id="toys" name="feature_text" value="Toys" <?php if ($checked == 'Toys') echo "checked='checked'"; ?>>
        <label for="toys">Toys</label><br>
        <input type="checkbox" id="food" name="feature_text" value="Cat Food" <?php if ($checked == 'Cat Food') echo "checked='checked'"; ?>>
        <label for="food">Food</label><br>
        <!--Text representation of currently select product category-->
        <p>Currently Featured: <b><?php echo $checked; ?></b></p>

        <?php submit_button(); ?>
    </form>
</div>