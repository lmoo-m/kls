<?php
require '../database/database.php';
require '../components/hostname.php';

$post = isset($_GET['post']) ? $_GET['post'] : "";

$query = mysqli_query($db, "select * from message");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            scroll-behavior: smooth;
        }

        body {
            background: #191717;
            color: white;
        }
    </style>
</head>

<body>
    <?php require_once '../components/navbar.php' ?>


    <div class=" mt-[5rem]">
        <?php
        if ($post) {
            require_once './' . $post . '.php';
        } else {
        ?>
            <div class="text-center">
                <div data-aos="zoom-in">
                    <h1 class='text-3xl font-bold mb-5'>Anonymous Chat</h1>
                </div>
            </div>
            <!-- galery -->
            <div class="flex flex-wrap md:px-[3rem] px-[1rem] py-5 gap-5 mt-5 ">
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="bg-white w-[25rem] text-black p-2 rounded-md shadow-sm shadow-white" data-aos="fade-up">
                        <h1 class="text-lg mt-2 font-semibold break-all">
                            <?= $row['message']; ?>
                        </h1>
                        <h2 class='text-sm text-end'>
                            <?= $row['time']; ?>
                        </h2>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>
</body>

</html>