from cryptography.fernet import Fernet
# Put this somewhere safe!
key = Fernet.generate_key()#gera uma chave
f = Fernet(key) #criptgrafa com a chave
token = f.encrypt(b"A really secret message. Not for prying eyes.") # o b é para converter em bytes

print (token) # print da chave

print (f.decrypt(token)) #desencripta a partir da chave
