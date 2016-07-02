$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
                $('#multiple').append(
                         '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input class="span4" id="perusahaan_' + count + '" name="perusahaan_' + count + '" type="text"></td>'
                         + '<td><input id="harga_' + count + '" name="harga_' + count + '" type="text" STYLE="text-align:right;"></td>'
						 + '<td style="vertical-align:middle;"><input id="persen_' + count + '" name="persen_' + count + '" type="text" STYLE="text-align:center;width:40px;"> %</td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });
$(document).ready(function() {
            var count = 0;
 
            $("#add_btn2").click(function(){
                    count += 1;
                $('#multiple2').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input class="span4" id="comite_' + count + '" name="comite_' + count + '" type="text"></td>'
                         + '<td><input id="user_' + count + '" name="user_' + count + '" type="text" STYLE="text-align:left;"></td>'
						 + '<td><input id="hse_' + count + '" name="hse_' + count + '" type="text" STYLE="text-align:left;"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rowsp_' + count + '" name="rowsp[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });			
$(document).ready(function() {
            var count = 0;
 
            $("#add_btn3").click(function(){
                    count += 1;
                $('#multiple3').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input class="span4" id="company_' + count + '" name="company_' + count + '" type="text"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rowse_' + count + '" name="rowse[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });
$(document).ready(function() {
            var count = 0;
 
            $("#add_btn4").click(function(){
                    count += 1;
                $('#multiple4').append(
                             '<tr class="records">'
                         + '<td ><div id="'+count+'">' + count + '</div></td>'
                         + '<td><input class="span4" id="perusahaan_' + count + '" name="perusahaan_' + count + '" type="text"></td>'
                         + '<td><input id="pegawai_' + count + '" name="pegawai_' + count + '" type="text" STYLE="text-align:left;"></td>'
						 + '<td><input id="jabatan_' + count + '" name="jabatan_' + count + '" type="text" STYLE="text-align:left;"></td>'
                         + '<td><a class="remove_item" href="#" >Delete</a>'
                         + '<input id="rowsh_' + count + '" name="rowsh[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });					