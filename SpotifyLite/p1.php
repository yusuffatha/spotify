<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" href="assets/spotify-logo.png" type="img/png">
</head>  
<body>

    <div class="sidebar">
      <div class="logo">
        <a href="HomeAfter.php">
          <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png" alt="Logo" />
        </a>
      </div>

      <div class="navigation">
        <ul>
          <li>
            <a href="HomeAfter.php">
              <span class="fa fa-home"></span>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="fa fa-search"></span>
              <span>Search</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="fa fas fa-book"></span>
              <span>Your Library</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="navigation">
        <ul>
          <li>
            <a href="#">
              <span class="fa fas fa-plus-square"></span>
              <span>Create Playlist</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="fa fas fa-heart"></span>
              <span>Liked Songs</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="policies">
        <ul>
          <li>
            <a href="#">Cookies</a>
          </li>
          <li>
            <a href="#">Privacy</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-container">
        <div class="header">
            <div class="topbar">
                <div class="prev-next-buttons">
                    <button type="button" class="fa fas fa-chevron-left"></button>
                    <button type="button" class="fa fas fa-chevron-right"></button>
                </div>
            </div>
            
            <div class="playlist-content">
              <?php
              $servername = "localhost";
              $username = "root"; // your MySQL username
              $password = ""; // your MySQL password
              $dbname = "spotifylite";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
              
              // Query SQL untuk mencari playlist berdasarkan judul
              $sql = "SELECT * FROM playlist WHERE Id = '1'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<div class='playlist-cover'>
                                <a href='{$row['otherpageurl']}'><img src='{$row['thumbnail']}'></a>
                            </div>
                            <div class='playlist-info'>
                              <div class='playlist-public'>PUBLIC PLAYLIST</div>
                              <div class='playlist-title'>
                                <p>{$row['title']}</p>
                              </div>
                              <div class='playlist-description'>
                                <p>{$row['description']}</p>
                              </div>
                              <div style='height: 10px;'></div>
                              <div class='playlist-stats'>
                                <img src='assets/spotify-logo.png' width='24px' height='24px' alt=''>
                                <span> Spotify ·</span>
                                <span>5,131,321 likes · </span>
                                <span>100 songs, </span>
                                <span>6 hr 57 min </span> 
                              </div>
                              <div style='height: 10px;'></div>
                            </div>";
                  }
              } else {
                  echo "No playlist found";
              }

              $conn->close();
              ?>
            </div>     
        </div>
        
        <div class="playlist-songs-container">
            <div class="playlist-buttons">
                <div class="playlist-buttons-left">
                    <div class="playlist-buttons-resume-pause">
                        <img src="assets/Pause.svg" alt="">
                    </div>
                    <div class="playlist-buttons-like">
                        <img src="assets/FiiledLike.svg" alt="" class="spotify-color">
                    </div>
                    <div class="playlist-buttons-download">
                        <img src="assets/Download.svg" alt="">
                    </div>
                    <div class="playlist-buttons-three-dot">
                        <img src="assets/ThreeDots.svg" alt="">
                    </div>
                </div>
                <div class="playlist-buttons-right">
                    <div class="playlist-buttons-search">
                        <img src="assets/Search.svg" alt="">
                    </div>
                    <div class="playlist-buttons-order">
                        Custom Order
                    </div>
                </div>
            </div>
            <div class="playlist-songs">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Album</th>
                        <th>Date Added</th>
                        <th>
                            <img src="assets/Duration.svg" alt="">
                        </th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="song-title">
                            <div class="song-image">
                                <img src="foto/2.jpeg" alt="">
                            </div>
                            <div class="song-name-album">
                                <div class="song-name">Young as the Morning old as the Sea</div>
                                <div class="song-artist">Passenger</div>
                            </div>
                        </td>
                        <td class="song-album">Young as the Morning old as the Sea</td>
                        <td class="song-date-added">May 31, 2022</td>
                        <td class="song-duration">
                            3:26
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td class="song-title">
                            <div class="song-image">
                                <img src="foto/3.jpeg" alt="">
                            </div>
                            <div class="song-name-album">
                                <div class="song-name">Young as the Morning old as the Sea</div>
                                <div class="song-artist">Passenger</div>
                            </div>
                        </td>
                        <td class="song-album">Young as the Morning old as the Sea</td>
                        <td class="song-date-added">May 31, 2022</td>
                        <td class="song-duration">
                            3:26
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="song-title">
                            <div class="song-image">
                                <img src="foto/4.jpeg" alt="">
                            </div>
                            <div class="song-name-album">
                                <div class="song-name">Young as the Morning old as the Sea</div>
                                <div class="song-artist">Passenger</div>
                            </div>
                        </td>
                        <td class="song-album">Young as the Morning old as the Sea</td>
                        <td class="song-date-added">May 31, 2022</td>
                        <td class="song-duration">
                            3:26
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="song-title">
                            <div class="song-image">
                                <img src="foto/5.jpeg" alt="">
                            </div>
                            <div class="song-name-album">
                                <div class="song-name">Young as the Morning old as the Sea</div>
                                <div class="song-artist">Passenger</div>
                            </div>
                        </td>
                        <td class="song-album">Young as the Morning old as the Sea</td>
                        <td class="song-date-added">May 31, 2022</td>
                        <td class="song-duration">
                            3:26
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
  </body>