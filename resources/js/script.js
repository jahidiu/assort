$(function () {
    // selectall check box in list
    $("#mainbox").click(function (e) {
        if ($(this).is(":checked", true)) {
            $(".ids").prop("checked", true);
        } else {
            $(".ids").prop("checked", false);
        }
    });

    // multi select module in group list start

    // all checkbox
    $("#sAll").click(function (e) {
        $(":checkbox").prop("checked", $(this).prop("checked"));
    });

    // view checkbox
    $("#sView").click(function (e) {
        let allCheckBox = $('input[name ="permissions[]');

        for (var i = 0; i < allCheckBox.length; i++) {
            if (allCheckBox[i].id.split("-")[1] == 1) {
                allCheckBox[i].checked = $(this).prop("checked");
            }
        }
    });

    // view checkbox
    $("#sAdd").click(function (e) {
        let allCheckBox = $("input:checkbox");

        for (var i = 0; i < allCheckBox.length; i++) {
            if (allCheckBox[i].id.split("-")[1] == 2) {
                allCheckBox[i].checked = $(this).prop("checked");
            }
        }
    });

    // view checkbox
    $("#sUpdate").click(function (e) {
        let allCheckBox = $("input:checkbox");

        for (var i = 0; i < allCheckBox.length; i++) {
            if (allCheckBox[i].id.split("-")[1] == 3) {
                allCheckBox[i].checked = $(this).prop("checked");
            }
        }
    });

    // view checkbox
    $("#sDelete").click(function (e) {
        let allCheckBox = $("input:checkbox");

        for (var i = 0; i < allCheckBox.length; i++) {
            if (allCheckBox[i].id.split("-")[1] == 4) {
                allCheckBox[i].checked = $(this).prop("checked");
            }
        }
    });

    // multi select module in group list end
});


// project hover
$('.project').hover(function () {
        // over
        const full = this.querySelector('.full');
        $(full).addClass('d-block');

    }, function () {
        const full = this.querySelector('.full');
        $(full).removeClass('d-block');

    }
);

//on project hover click

const full = $('.full');

full.click(function () {
    const url = $(this).attr('url');
    window.location.href = url;
});


// bootstrap dropdown effect

$('.dropdown').on('show.bs.dropdown', function (e) {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function (e) {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
});


// project image changing js

$(document).ready(function () {
    $('.production_facilities_images img').click(function (e) {
        e.preventDefault();
        let selected_src = $($(this)).attr('src');

        // change zoomed image

        $('.production_facilities_image img').attr('src', selected_src);
        $('.production_facilities_image a').attr('href', selected_src);

    });
});



// image resizer

$(document).ready(function() {
  $(".proportion").each(function() {
    var maxWidth = 350; // Max width for the image
    var maxHeight = 440; // Max height for the image
    var ratio = 0; // Used for aspect ratio
    var width = $(this).width(); // Current image width
    var height = $(this).height(); // Current image height

    // Check if the current width is larger than the max
    if (width > maxWidth) {
      ratio = maxWidth / width; // get ratio for scaling image
      $(this).css("width", maxWidth); // Set new width
      $(this).css("height", height * ratio); // Scale height based on ratio
      height = height * ratio; // Reset height to match scaled image
      width = width * ratio; // Reset width to match scaled image
    }

    // Check if current height is larger than max
    if (height > maxHeight) {
      ratio = maxHeight / height; // get ratio for scaling image
      $(this).css("height", maxHeight); // Set new height
      $(this).css("width", width * ratio); // Scale width based on ratio
      width = width * ratio; // Reset width to match scaled image
      height = height * ratio; // Reset height to match scaled image
    }
  });
});
