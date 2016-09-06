<div class="row">
  <div class="columns">
    <h2 class="prettytitle wow fadeInRight">
      Send us a <span>message!</span>
      <small>We’ll definitely reply</small>
    </h2>
  </div>
</div>
<div class="row wow fadeInLeft">
  <div class="columns medium-10 medium-push-1 tablet-8 tablet-push-2">
   <form id="contact_form" class="contactform" action="<?= get_template_directory_uri(); ?>/contact_me.php" method="post" data-abide novalidate autocomplete="off">
      <div class="row">
        <div class="columns small-6">
          <label for="message_name">
            <input type="text" required placeholder="Add Your name" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>" autocomplete="off">
            <small class="form-error">Name is required</small>
          </label>
        </div>

        <div class="columns small-6">
          <label for="message_email">
            <input type="email" required placeholder="E-mail address" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>" autocomplete="off">
            <small class="form-error">E-mail is required</small>
          </label>
        </div>
      </div>


      <div class="row">
        <div class="columns small-6">
          <label for="message_subject">
            <input type="email" required placeholder="Subject" id="message_subject" name="message_subject" value="<?php echo $_POST['message_subject']; ?>" autocomplete="off">
          </label>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="columns">
          <label for="message_text">
            <textarea required placeholder="&mdash;" rows="3" id="message_text" name="message_text" autocomplete="off">
              <?php if ($_POST['message_text']!='') { echo $_POST['message_text']; }?>
            </textarea>
            <small class="form-error">Required field</small>
          </label>
        </div>
      </div>

      <div id="result"></div>
<!--       <div data-abide-error class="alert callout" style="display: none;">
        <p>There are some errors in your form.</p>
      </div>
      <div data-abide-error class="success callout" style="display: none;">
        <p><strong>Dear Friend</strong><br>Your message has been successfully sent. We will contact you very soon!</p>
      </div> -->

      <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
      <input type="hidden" name="message_page" value="<?php the_title(); ?>">
      <input type="hidden" name="message_human" value="2">
      <input type="hidden" name="submitted" value="1">

      <div class="row formactions">
        <fieldset class="small-6 columns">
          <button id="contact_reset" type="reset" class="button success hollow">Clear</button>
        </fieldset>
        <fieldset class="small-6 columns text-right">
          <button id="contact_submit" type="submit" class="button success hollow">Send</button>
        </fieldset>
      </div>

    </form>
  </div>
</div>
