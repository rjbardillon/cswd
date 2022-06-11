var my_handlers = {

    fill_provinces:  function(){

        var region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
        
    },

    fill_cities: function(){

        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
    },


    fill_barangays: function(){

        var city_code = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
};

$(function(){
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);

    $('#region').ph_locations({'location_type': 'regions'});
    $('#province').ph_locations({'location_type': 'provinces'});
    $('#city').ph_locations({'location_type': 'cities'});
    $('#barangay').ph_locations({'location_type': 'barangays'});

    $('#region').ph_locations('fetch_list');
});

$(function(){
    $('#region').on('change', function(){
        var selected_caption = $("#region option:selected").text();
        $('input[name=region]').val(selected_caption);
    });

    $('#province').on('change', function(){
        var selected_caption = $("#province option:selected").text();
        $('input[name=province]').val(selected_caption);
    });

    $('#city').on('change', function(){
        var selected_caption = $("#city option:selected").text();
        $('input[name=city]').val(selected_caption);
    });

    $('#barangay').on('change', function(){
        var selected_caption = $("#barangay option:selected").text();
        $('input[name=barangay]').val(selected_caption);
    });
});
// For 2nd location
var my_handlers1 = {

    fill_provinces:  function(){

        var region_code1 = $(this).val();
        $('#province1').ph_locations('fetch_list', [{"region_code": region_code1}]);
        
    },

    fill_cities: function(){

        var province_code1 = $(this).val();
        $('#city1').ph_locations( 'fetch_list', [{"province_code": province_code1}]);
    },


    fill_barangays: function(){

        var city_code1 = $(this).val();
        $('#barangay1').ph_locations('fetch_list', [{"city_code": city_code1}]);
    }
};

$(function(){
    $('#region1').on('change', my_handlers1.fill_provinces);
    $('#province1').on('change', my_handlers1.fill_cities);
    $('#city1').on('change', my_handlers1.fill_barangays);

    $('#region1').ph_locations({'location_type': 'regions'});
    $('#province1').ph_locations({'location_type': 'provinces'});
    $('#city1').ph_locations({'location_type': 'cities'});
    $('#barangay1').ph_locations({'location_type': 'barangays'});

    $('#region1').ph_locations('fetch_list');
});

$(function(){
    $('#region1').on('change', function(){
        var selected_caption = $("#region option:selected").text();
        $('input[name=region]').val(selected_caption);
    });

    $('#province1').on('change', function(){
        var selected_caption = $("#province option:selected").text();
        $('input[name=province]').val(selected_caption);
    });

    $('#city1').on('change', function(){
        var selected_caption = $("#city option:selected").text();
        $('input[name=city]').val(selected_caption);
    });

    $('#barangay1').on('change', function(){
        var selected_caption = $("#barangay option:selected").text();
        $('input[name=barangay]').val(selected_caption);
    });
});
// For 3rd location
var my_handlers2 = {

    fill_provinces:  function(){

        var region_code2 = $(this).val();
        $('#province2').ph_locations('fetch_list', [{"region_code": region_code2}]);
        
    },

    fill_cities: function(){

        var province_code2 = $(this).val();
        $('#city2').ph_locations( 'fetch_list', [{"province_code": province_code2}]);
    },


    fill_barangays: function(){

        var city_code2 = $(this).val();
        $('#barangay2').ph_locations('fetch_list', [{"city_code": city_code2}]);
    }
};

$(function(){
    $('#region2').on('change', my_handlers2.fill_provinces);
    $('#province2').on('change', my_handlers2.fill_cities);
    $('#city2').on('change', my_handlers2.fill_barangays);

    $('#region2').ph_locations({'location_type': 'regions'});
    $('#province2').ph_locations({'location_type': 'provinces'});
    $('#city2').ph_locations({'location_type': 'cities'});
    $('#barangay2').ph_locations({'location_type': 'barangays'});

    $('#region2').ph_locations('fetch_list');
});

$(function(){
    $('#region2').on('change', function(){
        var selected_caption = $("#region option:selected").text();
        $('input[name=region]').val(selected_caption);
    });

    $('#province2').on('change', function(){
        var selected_caption = $("#province option:selected").text();
        $('input[name=province]').val(selected_caption);
    });

    $('#city2').on('change', function(){
        var selected_caption = $("#city option:selected").text();
        $('input[name=city]').val(selected_caption);
    });

    $('#barangay2').on('change', function(){
        var selected_caption = $("#barangay option:selected").text();
        $('input[name=barangay]').val(selected_caption);
    });
});

$(document).ready(function(){
    $("#id-type").on('change', function(){
        $(".registration-container").hide();
        $("#" + $(this).val()).fadeIn(700)
    });
}).change();
