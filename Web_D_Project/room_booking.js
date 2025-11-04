function updatePrice() {
    const roomType = document.getElementById('room_type').value;
    const priceInput = document.getElementById('price');
  
    switch (roomType) {
      case 'Single Bedroom':
        priceInput.value = '2000';
        break;
      case 'Double Bedroom':
        priceInput.value = '3500';
        break;
      case 'Luxury Room':
        priceInput.value = '10000';
        break;
      default:
        priceInput.value = '';
    }
  }
  