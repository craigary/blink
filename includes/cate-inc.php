<?php
include_once 'config.php';
if ($_POST['submit'] == 'Add New') {
  $metaName = mysqli_real_escape_string($db, $_POST['metaName']);
  $metaSlug = mysqli_real_escape_string($db, $_POST['metaSlug']);
  $metaDescription = mysqli_real_escape_string($db, $_POST['metaDescription']);
  $metaDefault = mysqli_real_escape_string($db, $_POST['isDefault']);
  if (empty($metaName)) {
    header("Location: ../admin/category.php?action=emptyName");
    exit();
  } else {
    if (empty($metaSlug)) {
      $metaSlug = $metaName;
    }
    $sql = "INSERT INTO blink_metas (name, slug, type, description) VALUES ('$metaName', '$metaSlug', 'category', '$metaDescription')";
    mysqli_query($db, $sql);
    if ($metaDefault == "on"){
      $sql = "SELECT mid FROM blink_metas ORDER BY mid DESC LIMIT 1";
      $categoryQueryResult = mysqli_fetch_assoc(mysqli_query($db, $sql));
      $defaultCategoryId = $categoryQueryResult['mid'];
      $sql = "UPDATE blink_options SET value = ".$defaultCategoryId." WHERE name = 'defaultCategory'";
      mysqli_query($db, $sql);
      header("Location: ../admin/category.php?action=newCategorySuccess");
      exit();
    } else {
      header("Location: ../admin/category.php?action=newCategorySuccess");
      exit();
    }
  }

} elseif ($_POST['submit'] == 'Update') {
  $metaId = mysqli_real_escape_string($db, $_POST['metaId']);
  $metaName = mysqli_real_escape_string($db, $_POST['metaName']);
  $metaSlug = mysqli_real_escape_string($db, $_POST['metaSlug']);
  $metaDescription = mysqli_real_escape_string($db, $_POST['metaDescription']);
  $metaDefault = mysqli_real_escape_string($db, $_POST['isDefault']);
  if (empty($metaName)) {
    header("Location: ../admin/category.php?action=emptyName");
    exit();
  } else {
    if (empty($metaSlug)) {
      $metaSlug = $metaName;
    }
    $sql = "UPDATE blink_metas SET name = '$metaName', slug = '$metaSlug', description = '$metaDescription' WHERE mid = $metaId";
    mysqli_query($db, $sql);
    if ($metaDefault == "on") {
      $sql = "UPDATE blink_options SET value = ".$metaId." WHERE name = 'defaultCategory'";
      mysqli_query($db, $sql);
      header("Location: ../admin/category.php?action=updateCategorySuccess");
      exit();
    } else {
      header("Location: ../admin/category.php?action=updateCategorySuccess");
      exit();
    }
  }
}
