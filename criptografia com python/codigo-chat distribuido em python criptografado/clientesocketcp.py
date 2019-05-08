import socket

from cryptography.fernet import Fernet

key = Fernet.generate_key()# cria uma chave para encriptar, com isso qualquer pessoa pode ter acesso.
f = Fernet(key) #com a chave, cria o algoritmo de encriptacao


#ip = raw_input('digite o ip de conexao: ')
port = 5555
addr = (('localhost',port))
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  #prepara a conecao
client_socket.connect(addr) #conecta ao ip e endereco
mensagem = ''
while mensagem != 'sair':
	mensagem = input("digite uma mensagem para enviar ao servidor")
	mensagemBytes = bytes(mensagem, "utf-8")
	token = f.encrypt(mensagemBytes)
	print (token)
	client_socket.send(token) #manda a mensage
	print ('mensagem enviada')
	recebida=client_socket.recv(1024)
	print (recebida)
	op = ""
	while op != "1":
		op = input("VOce precisa mandar a key para ele desencriptar, Deseja mandar a key agora ? 1 - sim ")
		if op =="1":
			client_socket.send(key)

client_socket.close() # fecha a conecao