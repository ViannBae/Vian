from flask import Flask, render_template, request, redirect, url_for, flash
from flask_sqlalchemy import SQLAlchemy
app = Flask(__name__)
app.config['SECRET_KEY'] = 'rahasia123'
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///data.db'
db = SQLAlchemy(app)

class Siswa(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    nama = db.Column(db.String(100), nullable=False)
    umur = db.Column(db.Integer)
    alamat = db.Column(db.Text)

    def __repr__(self):
        return f'<Siswa {self.nama}>'
with app.app_context():
    db.create_all()

@app.route('/')
def index():
    siswa_list = Siswa.query.all()
    return render_template('index.html', siswa_list=siswa_list)

@app.route('/tambah', methods=['GET', 'POST'])
def tambah():
    if request.method == 'POST':
        nama = request.form['nama']
        umur = request.form['umur']
        alamat = request.form['alamat']
        
        siswa_baru = Siswa(nama=nama, umur=umur, alamat=alamat)
        db.session.add(siswa_baru)
        db.session.commit()
        
        flash('Data berhasil ditambahkan!', 'success')
        return redirect(url_for('index'))
    
    return render_template('tambah.html')

@app.route('/ubah/<int:id>', methods=['GET', 'POST'])
def ubah(id):
    siswa = Siswa.query.get_or_404(id)
    
    if request.method == 'POST':
        siswa.nama = request.form['nama']
        siswa.umur = request.form['umur']
        siswa.alamat = request.form['alamat']
        
        db.session.commit()
        flash('Data berhasil diubah!', 'success')
        return redirect(url_for('index'))
    
    return render_template('ubah.html', siswa=siswa)

@app.route('/hapus/<int:id>')
def hapus(id):
    siswa = Siswa.query.get_or_404(id)
    db.session.delete(siswa)
    db.session.commit()
    
    flash('Data berhasil dihapus!', 'success')
    return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)