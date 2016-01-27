<style>
    .gmap3 {
        margin: 20px auto;
        border: 1px dashed #C0C0C0;
        width: 1100px;
        height: 600px;
    }
</style>

<script>
    jQuery('document').ready(function () {

        $('#test1').gmap3({
            map: {
                options: {
                    center: {lat: 49.138597, lng: 31.772461},
                    zoom: 6,
                    mapTypeId: google.maps.MapTypeId.TERRAIN
                }
            },
            polygon: {
                values: <?php echo $data; ?>,
                events: {
                    mouseover: function (polygon, event) {
                        polygon.setOptions({
                            fillColor: "#FFAF9F",
                            strokeColor: "#FF512F"
                        });
                    },
                    mouseout: function (polygon, event) {
                        polygon.setOptions({
                            fillColor: "#FF0000",
                            strokeColor: "#FF0000"
                        });
                    }
                }
            }
        });


    });
</script>

<script>
    jQuery('document').ready(function () {
        //$('#my-select').multiSelect();
        $('#my-select').multiSelect({
            selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"12\"'>",
            selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"4\"'>",
            afterInit: function (ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    });
</script>

<div id="test1" class="gmap3"></div>
<form enctype="multipart/form-data" action="/map/index" method="post"
      class="form-horizontal" role="form">

    <select multiple="multiple" id="my-select" name="my-select[]">
        <option value='elem_1'>elem 1</option>
        <option value='elem_2'>elem 2</option>
        <option value='elem_3'>elem 3</option>
        <option value='elem_4'>elem 4</option>
        <option value='elem_100'>elem 100</option>
    </select>

    <input type="hidden" name="select" value="1">
    <input type="submit" class="btn btn-success" value="select">
</form>

