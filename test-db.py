import mysql.connector
from mysql.connector import Error

# Ganti dengan public info dari plugin Railway (MYSQL_PUBLIC_URL)
host = "switchyard.proxy.rlwy.net"
port = 41941
user = "root"
password = "mNpenLbRQVifKNymIaVUCFRsLvuKBIPu"
database = "railway"

try:
    connection = mysql.connector.connect(
        host=host,
        port=port,
        user=user,
        password=password,
        database=database
    )

    if connection.is_connected():
        db_info = connection.get_server_info()
        print(f"✅ Connected to MySQL Server version {db_info} at {host}:{port}")
        connection.close()
except Error as e:
    print(f"❌ Error while connecting to MySQL: {e}")
