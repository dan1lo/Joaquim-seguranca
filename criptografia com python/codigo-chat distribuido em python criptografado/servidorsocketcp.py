import socket 
from cryptography.fernet import Fernet
#preparar o servidor
host = '' #ip - em branco para localhost
port = 5555 # porta
addr = (host, port) # endereco
serv_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM) # cria o socket
serv_socket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1) # reseta o socket se tiver ocupad
serv_socket.bind(addr) #define o ip e o a porta do socket
serv_socket.listen(2) #limite de conexoes
print ("aguardando conexao")
con, cliente = serv_socket.accept() # esperando para ser conectado
print ("cliente conectado") 
# fim da preparacao do servidor

recebe = ""
while (recebe != 'sair') :
	print ("aguardando mensagem\n")
	recebe = con.recv(1024) # recebendo a mensagem  encriptada
	print ("encriptado foi " + str(recebe))
	con.send(b"chegou a mensagem no servidor") #enviando mensagem de volta para a maquina que enviou
	op = input("Deseja desencriptar ? 1 para sim \n")
	if op == "1":
		key = con.recv(1024) # recebe a chava
		f = Fernet(key) #
		print (" A mensagem encriptada eh: \n")
		print ((f.decrypt(recebe)))
	else:
		mensagem = recebe
		print ("nao deseja, a mensagem encriptada eh: \n" + str(mensagem))


serv_socket.close() # fechando o socket
