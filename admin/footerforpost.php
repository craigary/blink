<footer>
  <p>
    <strong>Blink</strong> by <a href="https://craigary.net">Craig Hart</a>. The source code is licensed
    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
  </p>
</footer>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/simplemde.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
<script src="../js/noty.min.js"></script>
<script src="../js/dashboard.js"></script>
<script type="text/javascript">
  window.onload = function() {
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

  function getDateFormat(date, type) {
    var day = date.getDate();
    if (day < 10) {day = "0"+day;}
    var month = date.getMonth();
    if (month < 10) {month = "0"+month;}
    var year = date.getFullYear();
    if(type == "date"){
      var output = year+'-'+month+'-'+day;
    } else {
      var output = date.getHours() + ":" + date.getMinutes();
    }
    return output;
  }

  if (getUrlParameter('id') == undefined) {
    var currentDate = new Date();
    $("#datepicker").val(getDateFormat(currentDate, "date"));
    $("#timepicker").val(getDateFormat(currentDate, "time"));
  } else {
    var modifyDate = "<?php echo $singleArticleResult['modified']; ?>";
    $("#datepicker").val(modifyDate.substr(0,10));
    $("#timepicker").val(modifyDate.substr(11,5))

    var isPage = "<?php echo $singleArticleResult['isPage']; ?>";
    if (isPage == 1) {
      $('.isPagecheckbox').prop('checked', true);
    } else {
      $('.isPagecheckbox').prop('checked', false);
    }
  }

  $('.navbar-burger').click(function() {
    $('.navbar-burger').toggleClass('is-active');
  });
</script>