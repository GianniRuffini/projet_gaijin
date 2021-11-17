
    const mapboxToken = 'pk.eyJ1Ijoia2lyYWR1MTMiLCJhIjoiY2t2djdqZDF5MDBkYTJ2bjQxOHI1eHNhcCJ9.1Gy1cLL4PsURPsQFUeNSaw';
    
    let carte;
    let marker;

    //on enregistre toute les cordonnées des prefecture
    var prefectures = {
        //region hokkaido
        "Hokkaido": { "lat": 43.451983, "lon": 142.819783 },

        //region tohoku
        "Fukushima": { "lat": 37.75454, "lon": 140.459214 },
        "Miyagi": { "lat": 38.388016, "lon": 140.976103 },
        "Iwate": { "lat": 39.571376 , "lon": 141.425357 },
        "Aomori": { "lat": 40.886943 , "lon": 140.590121 },
        "Akita": { "lat": 39.68988 , "lon": 140.342608 },
        "Yamagata": { "lat": 38.474671 , "lon": 140.083237 },

        //region kanto
        "Tokyo": { "lat": 35.661922 , "lon": 139.678338 },
        "Kanagawa": { "lat": 35.434294 , "lon": 139.374753 },
        "Tochigi": { "lat": 36.678217 , "lon": 139.809655 },
        "Gunma": { "lat": 36.52198 , "lon": 139.033483 },
        "Saitama": { "lat": 35.975417 , "lon": 139.416011 },
        "Chiba": { "lat": 35.549399 , "lon": 140.26473 },
        "Ibaraki": { "lat": 36.286954 , "lon": 140.470338 },

        //region Chubu
        "Shizuoka": { "lat": 34.933249 , "lon": 138.09554 },
        "Yamanashi": { "lat": 35.639933 , "lon": 138.63805 },
        "Aichi": { "lat": 34.999165 , "lon": 137.254574 },
        "Gifu": { "lat": 35.786745 , "lon": 137.046078 },
        "Nagano": { "lat": 36.114395 , "lon": 138.031902 },
        "Ishikawa": { "lat": 36.988868 , "lon": 136.816356 },
        "Fukui": { "lat": 35.92635 , "lon": 136.606813 },
        "Niigata": { "lat": 37.645228 , "lon": 138.766913 },
        "Toyama": { "lat": 36.646802 , "lon": 137.218353 },

        //region kansai
        "Kyoto": { "lat": 35.242552 , "lon": 135.454601 },
        "Osaka": { "lat": 34.619881 , "lon": 135.490357 },
        "Nara": { "lat": 34.296309 , "lon": 135.881682 },
        "Hyogo": { "lat": 34.914934 , "lon": 134.860666 },
        "Shiga": { "lat": 35.247154 , "lon": 136.109385 },
        "Wakayama": { "lat": 33.807029 , "lon": 135.593074 },
        "Mie": { "lat": 34.733969 , "lon": 136.515449 },

        //region shikoku
        "Kagawa": { "lat": 34.24801 , "lon": 134.058658 },
        "Ehime": { "lat": 33.601365 , "lon": 132.818527 },
        "Kochi": { "lat": 33.656902 , "lon": 133.560624 },
        "Tokushima": { "lat": 33.919642 , "lon": 134.250963 },

        //region chugoku
        "Tottori": { "lat": 35.355508 , "lon": 133.867853 },
        "Shimane": { "lat": 34.941821 , "lon": 132.537439 },
        "Hiroshima": { "lat": 34.395473 , "lon": 132.453526 },
        "Okayama": { "lat": 34.858133 , "lon": 133.775926 },
        "Yamaguchi": { "lat": 34.237961 , "lon": 131.587385 },

        //region kyushu
        "Fukuoka": { "lat": 33.625124 , "lon": 130.618002 },
        "Saga": { "lat": 33.218541 , "lon": 130.129659 },
        "Nagasaki": { "lat": 33.115468 , "lon": 129.787434 },
        "Kumamoto": { "lat": 32.645047 , "lon": 130.634134 },
        "Oita": { "lat": 33.181988 , "lon": 131.427022 },
        "Miyazaki": { "lat": 32.097681 , "lon": 131.294542 },
        "Kagoshima": { "lat": 31.521587  , "lon": 130.547408 },

        //region okinawa
        "Okinawa": { "lat": 26.570775  , "lon": 128.02559 },

    };

    var tableauMarqueurs = [];

    //on initailise la carte
    carte = L.map('maCarte').setView([36.574844, 139.239418], 5);

    //on charge les 'tuiles'
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    //il est toujour bien de laisser le lien vers la source des données
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: mapboxToken,
    }).addTo(carte);

    var markers = L.markerClusterGroup();

    //on personnalise le marquer(attention si on change le marqueur il faut changer la position du popup)
    var icone = L.icon({
        iconUrl: "images/icone.png",
        iconSize: [30, 30],
        iconAnchor: [15, 30],
        popupAnchor: [0, -28]
    })

    //on parcourt les differentes villes
    for(prefecture in prefectures){
        //on crée le marqueur et on lui attribut un cercle et un popup
            marker = L.marker([prefectures[prefecture].lat, prefectures[prefecture].lon], {icon: icone})
            // .addTo(carte); //inutile lors de l'utilisation des clusters
            marker.bindPopup("<p>"+prefecture+"</p>");
            markers.addLayer(marker); //on ajoute le marker au groupe

            //on ajoute le marqueur au tableau
            tableauMarqueurs.push(marker);
    }

    //on regroupe les marqueurs dans un groupe leaflet pour qu'il soit tous visible a l'écran
    var groupe = new L.featureGroup(tableauMarqueurs);

    //on adapte le zoom au groupe
    carte.fitBounds(groupe.getBounds().pad(0.5));

    carte.addLayer(markers);