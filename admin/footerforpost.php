<footer >
  <p>
    <strong>Blink</strong> by <a href="https://craigary.net">Craig Hart</a>. The source code is licensed
    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
  </p>
</footer>
<!-- <script src="../js/jquery-3.3.1.min.js"></script> -->
<script src="../js/pell.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
<script>

window.pell.init({
  element: document.getElementById('article_textarea'),
  onChange: html => document.getElementById('hiddenTextarea').innerHTML = html
})

window.pell.init({
  element: document.getElementById('discription_textarea'),
  onChange: html => document.getElementById('hiddenDescriptionTextarea').innerHTML = html
})

var c = new Date();
if (c.getMinutes() < 10) {
  var currentTime = c.getHours() + ":0" + c.getMinutes();
} else {
  var currentTime = c.getHours() + ":" + c.getMinutes();
}

var dd = c.getDate();
var mm = c.getMonth()+1;
var yyyy = c.getFullYear();
if(dd<10) {
    dd = '0'+dd
}
if(mm<10) {
    mm = '0'+mm
}

var currentDate = yyyy + '-' + mm + '-' + dd;
document.getElementById("clockpicker").value = currentTime;
document.getElementById("datepicker").value = currentDate;

var content = "<?php echo $singleArticleResult['text']; ?>";//获取文章正文

</script>
</body>
</html>
