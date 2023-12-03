import pandas as pd
import random
from faker import Faker

# Configuración de Faker para generar datos en español de México
fake = Faker('es_MX')

# Funciones para generar datos
def generar_fecha():
    # Genera una fecha aleatoria entre dos fechas específicas
    start_date = pd.to_datetime('2010-01-01')
    end_date = pd.to_datetime('2023-12-31')
    return fake.date_between(start_date=start_date, end_date=end_date)

# Generar los datos para la tabla usuarios
num_registros = 1000000
datos_usuarios = {
    'id': [i for i in range(1, num_registros + 1)],
    'nombre': [fake.first_name() for _ in range(num_registros)],
    'usuario': [f"usuario{i}" for i in range(1, num_registros + 1)],
    'password': ['$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S' for _ in range(num_registros)],
    'perfil': [fake.random_element(['Administrador', 'Vendedor', 'Especial']) for _ in range(num_registros)],
    'estado': [random.randint(0, 1) for _ in range(num_registros)],
    'ultimo_login': [generar_fecha() for _ in range(num_registros)],
    'fecha': [generar_fecha() for _ in range(num_registros)]
}

# Crear el DataFrame
df_usuarios = pd.DataFrame(datos_usuarios)

# Guardar el DataFrame en un archivo Excel
archivo_excel_usuarios = 'usuarios_ejemplo.xlsx'  # Guarda el archivo en la carpeta actual
df_usuarios.to_excel(archivo_excel_usuarios, index=False)

print(f"Archivo de usuarios guardado como {archivo_excel_usuarios}")
