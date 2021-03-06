//------------------------------
//------------------------------
// Initialize and add the map
//------------------------------
//------------------------------

function initMap() {
    // The location of Italy
    const Italy = { lat: 42.503, lng: 12.504 };

    // The map, centered at Italy
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: Italy,
    });

    let parchi = JSON.parse(document.getElementById('all_parchi').innerHTML);

    let infoWindow = new google.maps.InfoWindow();

    Array.prototype.forEach.call(parchi, function(parco) {
        console.log(parco[4] + " " + parco[5]);
        const marker = new google.maps.Marker({
            position: new google.maps.LatLng(parco[4], parco[5]),
            map: map
        });

        google.maps.event.addListener(marker, "click", function() {
            infoWindow.close();
            infoWindow.setContent("<div position:absolute><img id='imgMappa' src='" + parco[1] + "'></div> <div style='padding-top: 40px'><b style='padding-left: 5%; margin-top:15px;'>" + parco[2] + "</b></br></br><p class='pMappa' style='margin-left: 50%'>" + parco[6] + "</br></br></br><a style='color:blue' href='App/Public/parco.php?IdParco=" + parco[0] + "'>Visita</a></p></div>");
            infoWindow.open(map, marker);
        });
    });
    // The marker, positioned at Italy
}


//------------------------------
//------------------------------
//Combobox
//------------------------------
//------------------------------

function Combobox(value) {
    let combobox = document.getElementById("cars");
    console.log(combobox.options[combobox.selectedIndex].value);
    combobox.options[combobox.selectedIndex].value = value;
}

function PswVisible() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


//------------------------------
//------------------------------
//Table and pagination
//------------------------------
//------------------------------


(function($) {
    $(function() {
        $.widget("zpd.paging", {
            options: {
                limit: 5,
                rowDisplayStyle: 'block',
                activePage: 0,
                rows: []
            },
            _create: function() {
                var rows = $("tbody", this.element).children();
                this.options.rows = rows;
                this.options.rowDisplayStyle = rows.css('display');
                var nav = this._getNavBar();
                this.element.after(nav);
                this.showPage(0);
            },
            _getNavBar: function() {
                var rows = this.options.rows;
                var nav = $('<div>', { class: 'paging-nav' });
                for (var i = 0; i < Math.ceil(rows.length / this.options.limit); i++) {
                    this._on($('<a>', {
                        href: '#',
                        text: (i + 1),
                        "data-page": (i)
                    }).appendTo(nav), { click: "pageClickHandler" });
                }
                //create previous link
                this._on($('<a>', {
                    href: '#',
                    text: '<<',
                    "data-direction": -1
                }).prependTo(nav), { click: "pageStepHandler" });
                //create next link
                this._on($('<a>', {
                    href: '#',
                    text: '>>',
                    "data-direction": +1
                }).appendTo(nav), { click: "pageStepHandler" });
                return nav;
            },
            showPage: function(pageNum) {
                var num = pageNum * 1; //it has to be numeric
                this.options.activePage = num;
                var rows = this.options.rows;
                var limit = this.options.limit;
                for (var i = 0; i < rows.length; i++) {
                    if (i >= limit * num && i < limit * (num + 1)) {
                        $(rows[i]).css('display', this.options.rowDisplayStyle);
                    } else {
                        $(rows[i]).css('display', 'none');
                    }
                }
            },
            pageClickHandler: function(event) {
                event.preventDefault();
                $(event.target).siblings().attr('class', "");
                $(event.target).attr('class', "selected-page");
                var pageNum = $(event.target).attr('data-page');
                this.showPage(pageNum);
            },
            pageStepHandler: function(event) {
                event.preventDefault();
                //get the direction and ensure it's numeric
                var dir = $(event.target).attr('data-direction') * 1;
                var pageNum = this.options.activePage + dir;
                //if we're in limit, trigger the requested pages link
                if (pageNum >= 0 && pageNum < this.options.rows.length) {
                    $("a[data-page=" + pageNum + "]", $(event.target).parent()).click();
                }
            }
        });
    });
})(jQuery);