// delete selected sliders

$("#deleteSelectedSliders").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Sliders to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/slider/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});


// delete selected Imagegallery Images

$("#deleteSelectedGalleryImages").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Images to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/images/multi_delete/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});


// delete selected Videogallery Videos

$("#deleteSelectedGalleryVideo").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Videos to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/videos/multi_delete/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);
});

// deleted pages

$("#deleteSelectedPages").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Pages to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/page/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

// deleted users 

$("#deleteSelectedUsers").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Users to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/user/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

// Delete Groups

$("#deleteSelectedGroups").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Groups to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/group/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

// delete selected Image Gallery

$("#deleteSelectedImageGallery").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Gallery to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/galleries/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

// delete selected Video Gallery

$("#deleteSelectedVideoGallery").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Gallery to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/vgalleries/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    // console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

// delete selected post

$("#deleteSelectedPosts").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Posts to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/post/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    //console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

// delete selected page categories

$("#deleteSelectedPageCategories").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Category to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/category/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    //console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

//post category deleted

$("#deleteSelectedPostCategories").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Category to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/post_category/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    //console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

//menu deleted

$("#deleteSelectedMenus").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Menu to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/menu/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    //console.log(err);
                });

        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);

});

//menulist deleted

$("#deleteSelectedMenulist").click(function(e) {
    e.preventDefault();

    let allids = [];

    $(".ids:checked").each(function() {
        allids.push($(this).attr("value"));
    });

    if (allids.length <= 0) {
        alert("Please select Menu to delete");
    } else {
        $('.delete_loader').css('display', 'block');
        var id_string = allids.join(",");
        let id_array = id_string.split(',');

        for (let i = 0; i < id_array.length; i++) {

            axios
                .delete(`/kt-admin/menu/multi_delete/` + id_array[i])
                .then(res => {
                    // if (res.success === "success") {
                    // console.log(res.data);
                    // }
                })
                .catch(err => {
                    //console.log(err);
                });
        }
    }
    setTimeout(
        function() {
            $('.delete_loader').css('display', 'none');
            location.reload(true);
        }, 3500);
});