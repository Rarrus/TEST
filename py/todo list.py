import datetime
import os

def iu(indPage):
    fica = (open('DBtodo/lundi.txt', 'a'),open('DBtodo/mardi.txt', 'a'),open('DBtodo/mercredi.txt', 'a'),open('DBtodo/jeudi.txt', 'a'),open('DBtodo/vendredi.txt', 'a'),open('DBtodo/samedi.txt', 'a'),open('DBtodo/dimanche.txt', 'a'))
    ficr = (open('DBtodo/lundi.txt', 'r'),open('DBtodo/mardi.txt', 'r'),open('DBtodo/mercredi.txt', 'r'),open('DBtodo/jeudi.txt', 'r'),open('DBtodo/vendredi.txt', 'r'),open('DBtodo/samedi.txt', 'r'),open('DBtodo/dimanche.txt', 'r'))
    jour = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche']
    print("")
    print(jour[indPage])
    for ligne in ficr[indPage]:
        print(ligne)
    text = input()
    if text == 'q':
        if indPage >= 1 :
            indPage = indPage - 1
        iu(indPage)
    elif text == 'd':
        if indPage < 6:
            indPage +=1
        iu(indPage)
    else :
        verif = input("SURE?")
        
        if verif == 'y':
            fica = open('DBtodo/'+jour[indPage]+'.txt', 'a')
            fica.write(str('-  ') + text +'\n')
            fica.close()
            ficr[indPage].close()
            
            iu(indPage)
        else:
            iu(indPage)
    
        

    
iu(datetime.date.today().weekday())