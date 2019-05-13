<footer>
  <p>
    <strong>Blink</strong> by <a href="https://craigary.net">Craig Hart</a>. The source code is licensed
    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
  </p>
</footer>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/moment.min.js"></script>
<script src="../js/simplemde.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
<script src="../js/datepicker.min.js"></script>
<script src="../js/jquery.timepicker.min.js"></script>
<script src="../js/noty.min.js"></script>
<script src="../js/dashboard.js"></script>
<script type="text/javascript">
  window.onload = function() {
    $('[data-toggle="datepicker"]').datepicker({});
    $('#timepicker').timepicker({
      'timeFormat': 'H:i',
      'step': 15
    });
  }
  var isMarkdown = <?php echo $settings['markdown']; ?>;
  if (isMarkdown == 0) {
    var simplemde = new SimpleMDE({
      element: $("#article_textarea")[0],
      spellChecker: false,
    });
    var simplemde1 = new SimpleMDE({
      element: $("#description_textarea")[0],
      toolbar: false,
      spellChecker: false,
    });
  } else if (isMarkdown == 1) {
    var simplemde = new SimpleMDE({
      element: $("#article_textarea")[0],
      toolbar: false,
      spellChecker: false,
    });
    var simplemde1 = new SimpleMDE({
      element: $("#description_textarea")[0],
      toolbar: false,
      spellChecker: false,
    });
  }
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;
    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
    }
  };
  if (getUrlParameter('id') == undefined) {
    var getDateAndTime = Date.now();
    document.getElementById('datepicker').value = moment(getDateAndTime).format('MM/DD/YYYY');
    document.getElementById('timepicker').value = moment(getDateAndTime).format('HH:mm');
  } else {
    var getDateAndTime = "<?php echo $singleArticleResult['created']; ?>";
    document.getElementById('datepicker').value = moment(getDateAndTime).format('MM/DD/YYYY');
    document.getElementById('timepicker').value = moment(getDateAndTime).format('HH:mm');
    var isPage = "<?php echo $singleArticleResult['isPage']; ?>";
    if (isPage == 1) {
      $('.isPagecheckbox').prop('checked', true);
    } else {
      $('.isPagecheckbox').prop('checked', false);
    }
  }
  // $('#submit').click(function(){
  //   $('#hiddenTextarea').val(editor.container.firstChild.innerHTML);
  //   $('#hiddenDescriptionTextarea').val(descEditor.container.firstChild.innerHTML);
  // });
  $('.navbar-burger').click(function() {
    $('.navbar-burger').toggleClass('is-active');
  });
</script>