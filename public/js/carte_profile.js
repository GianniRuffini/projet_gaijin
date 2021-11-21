
    const mapboxToken = 'pk.eyJ1Ijoia2lyYWR1MTMiLCJhIjoiY2t2djdqZDF5MDBkYTJ2bjQxOHI1eHNhcCJ9.1Gy1cLL4PsURPsQFUeNSaw';
    
    let carte;
    let marker;
    let prefectures = [];

console.log($(".prefecture"))
    //on boucle chaque prefecture et on recupère le titre 
    $(".prefecture").each(function(){
        prefectures[$(this).attr("data-titre")] = {"lat" : $(this).attr("data-latitude"), "lon" : $(this).attr("data-longitude")}
    })
    
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
    for( let prefecture in prefectures){
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