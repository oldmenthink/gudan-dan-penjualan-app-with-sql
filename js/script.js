function moveToSales(itemId) {
    if(confirm('Yakin ingin menjual barang ini?')) {
        fetch('sell_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'item_id=' + itemId
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Barang berhasil dijual! ✨');
                location.reload();
            }
        });
    }
}