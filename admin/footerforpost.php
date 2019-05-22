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
  var isMarkdownToolbar = <?php echo $settings['markdowntoolbar']; ?>;
  if (isMarkdownToolbar == 0) {
    var simplemde = new SimpleMDE({
      element: document.getElementById("article_textarea"),
      toolbar:false,
    });
    var simplemde1 = new SimpleMDE({
      element: document.getElementById("description_textarea"),
      toolbar:false,
      status: false,
    });
  } else if (isMarkdownToolbar == 1) {
    var simplemde = new SimpleMDE({
      element: document.getElementById("article_textarea"),
    });
    var simplemde1 = new SimpleMDE({
      element: document.getElementById("description_textarea"),
      toolbar: false,
      status: false,
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
    var hours = date.getHours();
    if (hours < 10) {hours = "0"+hours;}
    var minutes = date.getMinutes();
    if (minutes < 10) {minutes = "0"+minutes;}
    if(type == "date"){
      var output = year+'-'+month+'-'+day;
    } else if (type == "time") {
      var output = hours + ":" + minutes;
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