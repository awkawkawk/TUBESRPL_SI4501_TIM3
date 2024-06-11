from flask import Flask, request, jsonify
from flask_mysqldb import MySQL
import yaml

app = Flask(__name__)

# Konfigurasi dari file YAML atau bisa langsung di sini
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''  # Password MySQL Anda
app.config['MYSQL_DB'] = 'Manajemen_Resep_Obat'

mysql = MySQL(app)

# API REST untuk Membuat Resep Obat
@app.route('/resep', methods=['POST'])
def buat_resep():
    data = request.json
    id_pasien = data['id_pasien']
    id_obat = data['id_obat']
    jumlah_obat = data['jumlah_obat']
    keterangan_resep = data['keterangan_resep']
    
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO resep_obat (id_pasien, id_obat, jumlah_obat, keterangan_resep) VALUES (%s, %s, %s, %s)", 
                (id_pasien, id_obat, jumlah_obat, keterangan_resep))
    mysql.connection.commit()
    cur.close()
    return jsonify({'pesan': 'Resep berhasil ditambahkan'}), 201

# API REST untuk Membaca Resep Obat
@app.route('/resep', methods=['GET'])
def baca_resep():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM resep_obat")
    baris = cur.fetchall()
    hasil = []
    for row in baris:
        hasil.append({
            'id_resepobat': row[0],
            'id_pasien': row[1],
            'id_obat': row[2],
            'jumlah_obat': row[3],
            'keterangan_resep': row[4]
        })
    cur.close()
    return jsonify(hasil)

# API REST untuk Mengubah Resep Obat
@app.route('/resep/<int:id>', methods=['PUT'])
def ubah_resep(id):
    data = request.json
    id_pasien = data['id_pasien']
    id_obat = data['id_obat']
    jumlah_obat = data['jumlah_obat']
    keterangan_resep = data['keterangan_resep']
    
    cur = mysql.connection.cursor()
    cur.execute("UPDATE resep_obat SET id_pasien = %s, id_obat = %s, jumlah_obat = %s, keterangan_resep = %s WHERE id_resepobat = %s",
                (id_pasien, id_obat, jumlah_obat, keterangan_resep, id))
    mysql.connection.commit()
    cur.close()
    return jsonify({'pesan': 'Resep berhasil diubah'}), 200

# API REST untuk Menghapus Resep Obat
@app.route('/resep/<int:id>', methods=['DELETE'])
def hapus_resep(id):
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM resep_obat WHERE id_resepobat = %s", (id,))
    mysql.connection.commit()
    cur.close()
    return jsonify({'pesan': 'Resep berhasil dihapus'}), 200

if __name__ == '__main__':
    app.run(debug=True, port=5000)
