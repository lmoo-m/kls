<?php
if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $file = $_FILES['image']['name'];
    $tmp_files = $_FILES["image"]["tmp_name"];
    $time = date("d") . "/" . date("m") . "/" . date("Y") . " " . date("H") . ":" . date("i") . ":" . date("s");


    $p = pathinfo($file, PATHINFO_FILENAME);
    $a = pathinfo($file, PATHINFO_EXTENSION);
    $filename = $p . date("ymdhms") . "." . $a;

    move_uploaded_file($tmp_files, "../images/" . $filename);
    mysqli_query($db, "insert into images (image, title, time) values ('$filename', '$title', '$time')");
    header("location:" . $host . "/galery/");
}

?>

<script type="text/javascript">
    onload = () => {
        thumb.style.display = 'none'
    }

    function preview() {
        thumb.style.display = 'block'
        labelUpload.style.display = 'none'
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<div class="flex justify-center px-2 md:px-0 ">
    <div class="bg-[#FFFBF5] text-black rounded-md md:w-1/2 w-full p-5" data-aos="fade-up">
        <h1 class="text-xl font-bold">Post Image</h1>

        <form class="flex flex-col gap-3 mt-5" action="" method="post" enctype="multipart/form-data">
            <label for="title" class="text-lg font-semibold">Title</label>
            <input required placeholder="title" name="title" id="title" class="border border-[#87C4FF] outline-none h-[2rem] px-2 py-5 rounded-sm" />
            <label for="image" class="text-lg font-semibold">Image</label>
            <label id="labelUpload" for="image" class="border border-[#87C4FF] flex items-center  cursor-pointer outline-none h-[2rem] px-2 py-5 rounded-sm">Upload Image</label>
            <label for='image'>
                <img id="thumb" src="#" alt="your image" class="max-h-[15rem] ration-16/9" />
            </label>
            <input required placeholder="image" type="file" name="image" id="image" class="hidden" onchange="preview()" accept="image/*" />
            <div class="flex justify-between mt-5">
                <a class="border rounded-md px-3 py-2 hover:bg-white hover:text-black hover:border-red-500 transition bg-red-500 text-white" href=<?php echo $host . "/galery/" ?>>Cancel</a>
                <button class="border rounded-md px-3 py-2 hover:bg-white hover:text-black hover:border-[#87C4FF] transition bg-[#87C4FF] text-white" name='upload'>Submit</button>
            </div>
        </form>
    </div>
</div>