    if (data['status_proposal'] == 'DIPROSES' || data['status_proposal'] == 'DITERIMA') {
    if (data['id_tahap_proposal'] == '0') {
    renderData.push(['', '', 'Front Office', '-', statusSelf(3)]);
    } else {
    renderData.push([renderDate(data['date_acc_0']), data['fo1'], 'Front Office', data['catatan_0'], statusSelf(2)]);
    }
    // renderData.push([data['date_acc_1'], data['acc_1'], 'Back Office', statusSelf(2)]);
    if (data['id_tahap_proposal'] == '1') {
    renderData.push([data['date_acc_1'], data['bo1'], 'Kasi', '-', statusSelf(3)]);
    } else if (data['id_tahap_proposal'] < '1' ) { renderData.push(['-', '-' , '-' , '-' , statusSelf(4)]); } else { renderData.push([renderDate(data['date_acc_1']), data['bo1'], 'Kasi' , data['catatan_1'], statusSelf(2)]); } if (data['survey']=='ya' ) { if (data['id_tahap_proposal']=='2' ) { renderData.push([data['date_acc_2'], data['bo2'], 'Kabid' , '-' , statusSelf(3)]); } else if (data['id_tahap_proposal'] < '2' ) { renderData.push(['-', '-' , '-' , '-' , statusSelf(4)]); } else { renderData.push([renderDate(data['date_acc_2']), data['bo2'], 'Kabid' , data['catatan_2'], statusSelf(2)]); } if (data['id_tahap_proposal']=='3' ) { renderData.push([data['date_acc_3'], data['bo3'], 'Kasi' , '-' , statusSelf(3)]); } else if (data['id_tahap_proposal'] < '3' ) { renderData.push(['-', '-' , '-' , '-' , statusSelf(4)]); } else { renderData.push([renderDate(data['date_acc_3']), data['bo3'], 'Kasi' , data['catatan_3'], statusSelf(2)]); } } if (data['id_tahap_proposal']=='4' ) { renderData.push([data['date_acc_4'], data['bo4'], 'Back Office Draft Perizinan' , data['catatan_4'], statusSelf(3)]); } else if (data['id_tahap_proposal'] < '4' ) { renderData.push(['-', '-' , '-' , '-' , statusSelf(4)]); } else { renderData.push([renderDate(data['date_acc_4']), data['bo4'], 'Back Office Draft Perizinan' , data['catatan_4'], statusSelf(6)]); } if (data['id_tahap_proposal']=='5' ) { renderData.push([data['date_acc_5'], data['bo5'], 'Back Office Pemberkasan' , data['catatan_5'], statusSelf(3)]); } else if (data['id_tahap_proposal'] < '5' ) { renderData.push(['-', '-' , '-' , '-' , statusSelf(4)]); } else { renderData.push([renderDate(data['date_acc_4']), data['bo5'], 'Back Office Pemberkasan' , data['catatan_5'], statusSelf(6)]); } if (data['id_tahap_proposal']=='6' ) { renderData.push(['-', '-' , 'Kepala Dinas' , '-' , statusSelf(3)]); } else if (data['id_tahap_proposal'] < '6' ) { renderData.push(['-', '-' , 'Kepala Dinas' , '-' , statusSelf(4)]); } else { renderData.push([renderDate(data['date_kadin']), data['kadin'], 'Kepala Dinas' , data['catatan_kadin'], statusSelf(6)]); } } else if (data['status_proposal']=='DITOLAK' ) { if (data['tolak_in']=='1' ) { renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kasi' , data['catatan'], statusSelf(5)]); } else { renderData.push([renderDate(data['date_acc_1']), data['bo1'], 'Kasi' , data['catatan_1'], statusSelf(2)]); } if (data['survey']=='ya' ) { if (data['tolak_in']=='2' ) { renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kabid' , data['catatan'], statusSelf(5)]); } else { if (data['tolak_in']> '2') renderData.push([renderDate(data['date_acc_2']), data['bo2'], 'Kabid', data['catatan_2'], statusSelf(2)]);
        }
        if (data['tolak_in'] == '3') {
        renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kasi', data['catatan'], statusSelf(5)]);
        } else {
        if (data['tolak_in'] > '3') renderData.push([renderDate(data['date_acc_3']), data['bo3'], 'Kasi', data['catatan_3'], statusSelf(2)]);
        }

        }
        if (data['tolak_in'] == '6') {
        renderData.push([renderDate(data['date_tolak']), data['nama_tolak'], 'Kepala Dinas', data['catatan'], statusSelf(5)]);
        }
        if (data['id_tahap_proposal'] == '4') {
        renderData.push(['', '', 'Back Office Draft Penolakan', '-', statusSelf(3)]);
        } else if (data['id_tahap_proposal'] > '4') {
        renderData.push([renderDate(data['date_acc_4']), data['bo4'], 'Back Office Draft Penolakan', data['catatan_4'], statusSelf(6)]);
        } else {
        renderData.push(['', '', 'Cetak', '-', statusSelf(4)]);
        }
        if (data['id_tahap_proposal'] == '5') {
        renderData.push(['', '', 'Back Office Pemberkasan', '-', statusSelf(3)]);
        } else if (data['id_tahap_proposal'] > '5') {
        renderData.push([renderDate(data['date_acc_5']), data['bo5'], 'Back Office Pemberkasan ', data['catatan_5'], statusSelf(6)]);
        } else {
        renderData.push(['', '', 'Back Office Pemberkasan', '-', statusSelf(4)]);
        }
        if (data['id_tahap_proposal'] == '6') {
        renderData.push(['', '', 'Tanda Tangan Kepala Dinas', '-', statusSelf(3)]);
        } else if (data['id_tahap_proposal'] > '6') {
        renderData.push([renderDate(data['date_kadin']), data['kadin'], 'Tanda Tangan Kepala Dinas', data['catatan_kadin'], statusSelf(6)]);
        } else {
        renderData.push(['', '', 'Tanda Tangan Kepala Dinas', '-', statusSelf(4)]);
        }
        }