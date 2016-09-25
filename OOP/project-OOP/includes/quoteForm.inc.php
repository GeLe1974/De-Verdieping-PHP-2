<div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control" value="<?= (isset($quote)?$quote->getName():'') ?>" />
  <?php if (isset($formerrors['name'])): ?>
    <span class="form-error"><?= $formerrors['name'] ?></span>
  <?php endif; ?>
</div>

<div class="form-group">
  <label for="quote">Quote</label>
  <textarea name="quote" id="quote" cols="30" rows="10" class="form-control"><?= (isset($quote)?$quote->getQuote():'') ?></textarea>
  <?php if (isset($formerrors['quote'])): ?>
    <span class="form-error"><?= $formerrors['quote'] ?></span>
  <?php endif; ?>
</div>