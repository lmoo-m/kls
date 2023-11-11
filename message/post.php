<?php
if (isset($_POST['upload'])) {
    $msg = $_POST['msg'];
    $time = date("d") . "/" . date("m") . "/" . date("Y");

    mysqli_query($db, "insert into message (message, time) values ('$msg', '$time')");
    header("location:" . $host);
}

?>

<div class="flex justify-center px-2 md:px-0 ">
    <div class="bg-[#FFFBF5] text-black rounded-md md:w-1/2 w-full p-5" data-aos="fade-up">
        <h1 class="text-xl font-bold">Send Anonymous Chat</h1>

        <form class="flex flex-col gap-3 mt-5" action="" method="post" enctype="multipart/form-data">
            <label for="msg" class="text-lg font-semibold">Message</label>
            <input required placeholder="Message" name="msg" id="msg" class="border border-[#87C4FF] outline-none h-[2rem] px-2 py-5 rounded-sm" />

            <div class="flex justify-between mt-5">
                <a class="border rounded-md px-3 py-2 hover:bg-white hover:text-black hover:border-red-500 transition bg-red-500 text-white" href=<?php echo $host ?>>Cancel</a>
                <button class="border rounded-md px-3 py-2 hover:bg-white hover:text-black hover:border-[#87C4FF] transition bg-[#87C4FF] text-white" name='upload'>Submit</button>
            </div>
        </form>
    </div>
</div>