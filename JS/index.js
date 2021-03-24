// Initialize and add the map
function initMap() {
    // The location of Italy
    const Italy = { lat: 42.50, lng: 12.50 };
    const Italy_2 = { lat: 43.50, lng: 11.50 };

    // The map, centered at Italy
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: Italy,
    });
    // The marker, positioned at Italy
    const marker = new google.maps.Marker({
      position: Italy,
      map: map,
    });
    const marker2 = new google.maps.Marker({
      position: Italy_2,
      map: map,
    });
  }