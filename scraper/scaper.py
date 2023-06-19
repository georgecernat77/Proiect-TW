from bs4 import BeautifulSoup
import requests
import json

def scraping():
    #leu
    site= requests.get('https://www.britannica.com/animal/lion').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]
    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    index=1
    for location in locationList:
        p=location.find('p',class_='font-16').text

        match index:
            case 1:
                dictionary["longevity"]=[p]
            case 2:
                dictionary["location"]=[p]
            case 5:
                dictionary["diet"]=[p]
        index=index+1


    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Panthera leo']


    habitats=[]
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/savanna'))
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/grassland'))
    dictionary['habitat']=habitats


    places=[]
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Africa'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/India'))
    places.extend(['Asia'])
    dictionary["location"]=places



    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tiger')

    relatives=[]
    index=0
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=4)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)

    #tiger
    site= requests.get('https://www.britannica.com/animal/tiger').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text
    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    
    dictionary['description']=description

    index=1
    for location in locationList:
        p=location.find('p',class_='font-16').text

        match index:
            case 1:
                dictionary["longevity"]=p
            case 2:
                dictionary["location"]=p
            case 5:
                dictionary["diet"]=p
        index=index+1
    dictionary['location']=['Asia']
    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Panthera tigris']


    habitats=[]
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/rainforest'))
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/grassland'))
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/deciduous-forest'))

    dictionary['habitat']=habitats


    dictionary['diet']='deer, water buffalo, antelope, and pigs'
    dictionary['location']=[dictionary['longevity']]
    dictionary['longevity']=['10 – 15 years']

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/lion')

    relatives=[]
    index=0
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)

    #crocodil

    site= requests.get('https://www.britannica.com/animal/crocodile-order').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description


    dictionary['description']=description
    index=1
    for location in locationList:
        p=location.find('p',class_='font-16').text

        match index:
            case 1:
                dictionary["longevity"]=p
            case 2:
                dictionary["location"]=p
            case 5:
                dictionary["diet"]=p
        index=index+1

    dictionary["longevity"]=['50-70 years']
    dictionary["location"]=['Africa','United-States','Asia','South America']
    dictionary["diet"]=['nsects, fish, small frogs, lizards, crustaceans and small mammals']

    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['type']=['reptile']
    dictionary['scientificName']=['Crocodylidae']


    habitats=["Lake","River"]

    dictionary['habitat']=habitats

    relatives=[]

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/Nile-crocodile')

    
    for location in locationList:
        relatives.append(location.text)

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/alligator')

    
    for location in locationList:
        relatives.append(location.text)
    
    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/caiman')

    
    for location in locationList:
        relatives.append(location.text)
    
    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/gavial')

    
    for location in locationList:
        relatives.append(location.text)
    
    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/estuarine-crocodile')

    
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']='carnivorous'

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)

    #delfin
    site= requests.get('https://www.britannica.com/animal/dolphin-mammal').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    index=1
    for location in locationList:
        p=location.find('p',class_='font-16').text

        match index:
            case 1:
                dictionary["longevity"]=p
            case 2:
                dictionary["location"]=p
            case 5:
                dictionary["diet"]=p
        index=index+1

    dictionary["longevity"]=['40 years']
    dictionary["location"]=['Asia','America','Europe','Africa','South America']
    dictionary["diet"]=['fish,squid, jellyfish']


    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Delphinus']


    habitats=['Ocean','Sea','River']

    dictionary['habitat']=habitats
    relatives=[]


    locationList=scraper.find('a', href='https://www.britannica.com/animal/killer-whale')
    
    for location in locationList:
        relatives.append(location.text)
    
    
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #beluga

    site= requests.get('https://www.britannica.com/animal/beluga').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    index=1
    for location in locationList:
        p=location.find('p',class_='font-16').text

        match index:
            case 1:
                dictionary["longevity"]=p
            case 2:
                dictionary["location"]=p
            case 5:
                dictionary["diet"]=p
        index=index+1

    dictionary["longevity"]=['35 – 50 years']
    dictionary["location"]=['Arctic Ocean','Canada','Russia','Greenland','America','Asia','Europe']
    dictionary["diet"]=['octopus, squid, crabs, shrimp, clams, snails, sandworms']



    dictionary['type']=['mammal']
    dictionary['scientificName']=['Delphinapterus leucas']

    habitats=[]
    habitats.extend(scraper.find('a',href='https://www.britannica.com/place/Arctic-Ocean'))
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/river'))

    dictionary['habitat']=habitats


    relatives=[]
    index=0

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/narwhal')
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #tarantula

    site= requests.get('https://www.britannica.com/animal/tarantula').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    index=1
  
    dictionary["longevity"]=['15-25 years']
            
    dictionary["location"]=['America','South America','Africa','Asia','Australia']
            
    dictionary["diet"]=['insects,spiders,frogs,snakes,rats']
        

    dictionary['type']=['Artropod']
    dictionary['scientificName']=['Theraphosidae']

    habitats=['rainforest','dessert','soil']

    dictionary['habitat']=habitats


    relatives=[]
    


    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/trap-door-spider')
    for location in locationList:
        relatives.append(location.text)
    
    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/funnel-web-spider')
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)

    #saltwater crocodile

    site= requests.get('https://www.britannica.com/animal/estuarine-crocodile').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    dictionary["longevity"]=['70 years']
            
    dictionary["location"]=['Southest Asia','Australia','Micronesia']
            
    dictionary["diet"]=['mammals,birds,frogs,sharks,humans']


    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Crocodylus porosus']

    habitats=[]
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/wetland'))

    dictionary['habitat']=habitats

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/crocodile')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #funnel web spooder 

    site= requests.get('https://www.britannica.com/animal/funnel-web-spider').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    dictionary["longevity"]=['7 years']
            
    dictionary["location"]=['Australia','Tasmania','Japan']
            
    dictionary["diet"]=['insects,larvae, snails, millipedes, frogs']

    dictionary['type']=['Artropod']
    dictionary['scientificName']=['family Dipluridae']

    habitats=['Soil']

    dictionary['habitat']=habitats


    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/trap-door-spider')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    
    #trapdoor spooder

    
    site= requests.get('https://www.britannica.com/animal/trap-door-spider').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    places=[]
    places.extend(scraper.find('a',href='https://www.britannica.com/place/United-States'))

    dictionary['longevity']=['5-20 years']
    dictionary['diet']=['insects, lizards']

    dictionary['location']=places

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tarantula')

    dictionary['type']=['Artropod']
    dictionary['scientificName']=['Ctenizidae']

    habitats=['Soil']

    dictionary['habitat']=habitats

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)

    #cameleon

    site= requests.get('https://www.britannica.com/animal/chameleon-reptile').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    places=['Africa','Asia']

    places.extend(scraper.find('a',href='https://www.britannica.com/place/Madagascar'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/India'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Sri-Lanka'))

    dictionary['location']=places
    dictionary['diet']=['locusts, mantids, grasshoppers, crickets']
    dictionary['longevity']=['5 - 10 years']

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Chamaeleonidae']

    habitats=['rainforests','semi-dessert']

    dictionary['habitat']=habitats

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tarantula')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #piton
    site= requests.get('https://www.britannica.com/animal/python-snake-group').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    dictionary['type']=['reptile']
    dictionary['scientificName']=['Pythonidae']


    habitats=['rainforest']
    dictionary['habitat']=habitats

    places=['Australia']

    places.extend(scraper.find('a',href='https://www.britannica.com/place/China'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/India'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Moluccas'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Indonesia'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/New-Guinea'))
    places.extend(['Asia'])

    dictionary['location']=places
    dictionary['diet']=['rodents, lizards, birds, monkeys, pigs, antelopes']
    dictionary['longevity']=['10 years']

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description


    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tarantula')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['carnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    
    #bear
    site= requests.get('https://www.britannica.com/animal/bear').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    dictionary['diet']=['honey, nuts, fish, fruit, mammals']
    dictionary['longevity']=['20-30 years']

    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Ursidae']

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    habitats=['forest']
    dictionary['habitat']=habitats
    
    places=[]

    places.extend(scraper.find('a',href='https://www.britannica.com/place/Europe'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/United-States'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Asia'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/South-America'))

    dictionary['location']=places


    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    relatives=[]
    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/sun-bear')

    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['omnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #peacock
    site= requests.get('https://www.britannica.com/animal/peacock').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]
    dictionary['id']=['id']


    dictionary['diet']=['plants, insects, small creatures']
    dictionary['longevity']=['15 years']

    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Phasianidae']


    habitats=['forests']
    dictionary['habitat']=habitats


    places=[]

    places.extend(scraper.find('a',href='https://www.britannica.com/place/India'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Sri-Lanka'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Myanmar'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Democratic-Republic-of-the-Congo'))
    places.extend(['Asia'])
    places.extend(['Africa'])

    dictionary['location']=places


    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tiger')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives
    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['omnivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #rhino
    site= requests.get('https://www.britannica.com/animal/rhinoceros-mammal').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]
 
    dictionary['diet']=['grass']
    dictionary['longevity']=['35-50 years']
    places=[]

    places.extend(scraper.find('a',href='https://www.britannica.com/place/Asia'))

    dictionary['location']=places

    dictionary['type']=[scraper.find('div',class_="topic-identifier font-16 font-md-20").text]
    dictionary['scientificName']=['Rhinocerotidae']


    habitats=['savanna','grassland']
    dictionary['habitat']=habitats

    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tiger')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives

    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['herbivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    #gorilla
    site= requests.get('https://www.britannica.com/animal/Gorilla-primate-genus').text
    scraper=BeautifulSoup(site,'lxml')

    name=scraper.find('h1',class_='mt-20 mb-0').text

    locationList=scraper.find_all('div', class_='accordion--answer-copy p-20 bg-gray-50')

    dictionary={}
    dictionary['visible']=[1]
    dictionary['name']=[name]

    dictionary['diet']=['leaves, shoots, stems, roots, larvae, snails, barks, rotten wood']
    dictionary['longevity']=['35 – 40 years']

    dictionary['type']=['mammal']
    dictionary['scientificName']=['Gorilla']


    habitats=[]
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/tropical-rainforest'))
    habitats.extend(scraper.find('a',href='https://www.britannica.com/science/rainforest'))
    dictionary['habitat']=habitats
    
    places=['Africa']

    places.extend(scraper.find('a',href='https://www.britannica.com/place/Lake-Kivu'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Rwanda'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Central-African-Republic'))
    places.extend(scraper.find('a',href='https://www.britannica.com/place/Democratic-Republic-of-the-Congo'))

    dictionary['location']=places


    description=[]
    
    descriptionList=scraper.find_all('p',class_='topic-paragraph')

    index=0

    for d in descriptionList:
        if index<=2:
            description.extend([d.text])
        index=index+1
    dictionary['description']=description

    locationList=scraper.find_all('a', href='https://www.britannica.com/animal/tiger')

    relatives=[]
    for location in locationList:
        relatives.append(location.text)
    
    dictionary['related']=relatives
    dictionary['endangered']=[0]

    isEndangered=scraper.find_all('a',href='https://www.britannica.com/science/endangered-species')
    
    if len(isEndangered)!=0:
        dictionary['endangered']=[1]
    
    dictionary['eatingHabit']=['herbivorous']

    animal=json.dumps(dictionary,indent=3)
    with open(f'{name}.json', "w") as outfile:
        outfile.write(animal)
    
scraping()