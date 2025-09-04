<?php
ob_start();
include 'inc/header.php';

?>

<style>
    .action .action_edit {
        text-decoration: none;
        color: orange;
    }

    .action .action_delete {
        text-decoration: none;
        color: red;
    }

    .action .action_view {
        text-decoration: none;
        color: #01969a;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">QL file json</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách file json</li>
    </ol>
</nav>
<form action="" method="get">
    <div class="row " style="display: flex; align-items: center; justify-content: space-between;">
        <div class="col-sm-4">
            <input id="searchInput" name="searchInput" type="text" class="form-control" placeholder="tìm kiếm">
        </div>
        <div style="display: flex; align-items: center; gap: 10px;" class="col-sm-6 flex">
            <input class="form-control" type="text" id="newFile" placeholder="Nhập tên file...">
            <button class="btn btn-success" onclick="addFile(document.getElementById('newFile').value)">Thêm</button>

        </div>
    </div>
</form>

<div style="padding: 10px;">
    <table style="background-color: #a9c2c3; border-collapse: inherit; border-radius: 10px; "
        class="table table-striped table-hover">
        <thead>
            <tr>
                <th style="border-top-left-radius: 8px; " scope="col">ID</th>
                <th scope="col">slug</th>

                <th style="border-top-right-radius: 8px; " scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody id="tbody" style="border-bottom-right-radius: 8px; ">


        </tbody>
    </table>

</div>

<script>
    async function loadFiles() {
        const res = await fetch(`<?php echo $local ?>/load/vnbacsionline/files.json`);
        const data = await res.json();
        return data.files;
    }

    // Hàm chia mảng thành phân trang
    function paginateFiles(files, page = 1, perPage = 5) {
        const start = (page - 1) * perPage;
        const end = start + perPage;
        const paginatedItems = files.slice(start, end);

        return {
            currentPage: page,
            perPage: perPage,
            totalItems: files.length,
            totalPages: Math.ceil(files.length / perPage),
            data: paginatedItems
        };
    }

    (async () => {
        const files = await loadFiles();
        let filteredFiles = files; // dữ liệu sau khi search
        const perPage = 1000; // số item mỗi trang
        let currentPage = 1;

        const tbody = document.getElementById("tbody");

        function renderTable(page = 1) {
            const pageData = paginateFiles(filteredFiles, page, perPage);
            tbody.innerHTML = ""; // clear cũ
            pageData.data.forEach((file, index) => {
                const tr = document.createElement("tr");
                tr.className = "item";
                tr.innerHTML = `
                    <th scope="row">${(pageData.currentPage - 1) * pageData.perPage + index + 1}</th>
                    <td>${file}</td>
                    <td><button class="btn btn-danger" onclick="deleteFile('${file}')">Xóa</button></td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Gọi lần đầu
        renderTable(currentPage);

        // Lắng nghe sự kiện search
        document.getElementById("searchInput").addEventListener("input", function() {
            const keyword = this.value.toLowerCase();
            filteredFiles = files.filter(file => file.toLowerCase().includes(keyword));
            currentPage = 1; // reset về trang 1
            renderTable(currentPage);
        });
    })();

    async function addFile(file) {
        const res = await fetch("<?php echo $local ?>/load/vnbacsionline/add_file.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                file
            })
        });
        const result = await res.json();
        alert(result.message);
        console.log(result, 'result');

        if (result.status === "success") {
            window.location.reload()
        }
    }

    async function deleteFile(file) {
        const res = await fetch("<?php echo $local ?>/load/vnbacsionline/delete_file.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                file
            })
        });
        const result = await res.json();
        alert(result.message);

        if (result.status === "success") {
            window.location.reload()
        }
    }
</script>


<?php include 'inc/footer.php'; ?>