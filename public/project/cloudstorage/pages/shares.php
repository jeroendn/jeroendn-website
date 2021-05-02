<?php
include_once __DIR__ . '../../php/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Cloud Storage - Shared with you</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.php' ?>

    <main id="shares" class="page-content">
      <section class="container mt-3">
        <?php
        $sql = "SELECT * FROM (share INNER JOIN document ON share.document_id = document.document_id) WHERE share.user_id = '" . $_SESSION['user_id'] . "' ORDER BY share.share_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documents as $document) {

          // !!

          $sql = "SELECT user.user_mail, user.user_id, user.user_name FROM user INNER JOIN document ON user.user_id = document.user_id WHERE document_id=:document_id";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':document_id', $document['document_id'], PDO::PARAM_INT);
          $stmt->execute();
          $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $user_id = $user[0]['user_id'];
          $username = $user[0]['user_name'];

          // !!

        ?>
        <div class="card mt-3 p-2">
          <div class="data">
            <?php
            $url_data = htmlspecialchars('file=' . $document['document_name'] . '&user=' . str_replace(' ', '_', $username) . '&user_id=' . $user_id);
            // get image from secure location
            $doc_name = pathinfo($document['document_name']);
            if ($doc_name['extension'] == 'png' || $doc_name['extension'] == 'jpg' || $doc_name['extension'] == 'jpeg' || $doc_name['extension'] == 'gif' || $doc_name['extension'] == 'jfif') {
              echo '<img src="php/getsharedfile.php?' . $url_data . '"/>';
              // echo '<img src="' . get_shared_file($document['document_name'], $user[0]['user_name'], $user[0]['user_id']) . '"/>';
            }
            else if ($doc_name['extension'] == 'mp4') {
              echo '<video src="php/getsharedfile.php?' . $url_data . '" type="mp4" controls></video>';
            }
            else {
              echo '<img src="design/no_image.png"/>';
            }
            ?>
            <p class="card-title"><?php echo $document['document_name'] ?></p>
            <p class="file-size"><?php file_size_calc(get_shared_file_dir($username, $user_id, $document['document_name'])); ?></p>
            <p class="date"><?php echo date("d/M/Y H:i", strtotime($document['document_date'])); ?></p>
          </div>
          <div class="buttons">
            <a href="php/getsharedfile.php?<?php echo $url_data ?>" class="btn btn-primary" download="<?php echo htmlspecialchars($document['document_name']) ?>">Download</a>
            <a href="#!" class="btn btn-info btn-share">View shares</a>
            <a href="#!" class="btn btn-danger btn-delete">Remove share</a>
          </div>
          <input type="hidden" name="document_id" value="<?php echo $document['document_id'] ?>">
          <div class="share mt-2">
            <h6 class="mt-2 mb-0">Shared by:</h6>
            <div class="current-share">
            <p><?php echo htmlspecialchars($user[0]['user_mail']); ?></p>
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            </div>
            <h6 class="mt-2 mb-0">Shared to:</h6>
            <div class="current-share">
            <?php
            $sql = "SELECT user.user_id, user.user_mail FROM share INNER JOIN user ON share.user_id = user.user_id WHERE document_id=:document_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':document_id', $document['document_id'], PDO::PARAM_INT);
            $stmt->execute();
            $shares = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($shares as $share) {
              ?><div class="container mb-1"><p><?php echo htmlspecialchars($share['user_mail']); ?></p></div><?php
            }
            ?>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
