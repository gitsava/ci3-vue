def selection_sort(Inputlist):
    for idx in range(len(Inputlist)):
        min_idx = idx 
        for j in range( idx+1, len(Inputlist)):
            if Inputlist[min_idx] > Inputlist[j]:
                min_idx = j
        
        Inputlist[idx], Inputlist[min_idx] = Inputlist[min_idx], Inputlist[idx]

list = [19,2,31,45,30,11,121,27]
selection_sort(list)

print(list)